<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
        // dd('profile');
    }

    public function index()
    {
        $users = User::where('role_id', 3 )->get();
        return view('user', ['users' => $users]);
    }
}
