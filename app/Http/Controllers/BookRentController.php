<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1 )->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        
        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Ridak Bisa pinjam buku karena stok habis'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('book-rent');
        }

        else{
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
            ->count();

            if($count >= 3) {
                Session::flash('message', 'tidak Bisa pinjam buku karena sudah meminjam 3 buku'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('book-rent');
            }
            else {
                try {
                    DB::beginTransaction();
    
                    RentLogs::create($request->all());
    
                    $book = Book::findOrFail($request->book_id);

                    //status ga iso
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
    
                    Session::flash('message', 'Selamat Menikmati Buku'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
            
        }
    }

    public function returnBook()
    {
        $users = User::where('id', '!=', 1 )->get();
        $books = Book::all();
        return view('return-book', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        
        if ($countData == 1) {
            //retun book
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'Buku berhasil dikembalikan'); 
                Session::flash('alert-class', 'alert-success'); 
                return redirect('book-return');
        } else {
            //errorr

            Session::flash('message', 'Gagal mengembalikan buku silahkan cek kembali'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('book-return');
        }
        
    }
}
