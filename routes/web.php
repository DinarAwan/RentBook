<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'index']);

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('register', [AuthController::class, 'register'])->middleware('guest');
Route::post('register', [AuthController::class, 'registerProcess'])->middleware('guest');

Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('profile', [UserController::class, 'profile'])->middleware('auth');

Route::get('books', [BookController::class, 'index'])->middleware('auth');
Route::get('book-add', [BookController::class, 'add'])->middleware('auth');
Route::post('book-add', [BookController::class, 'store'])->middleware('auth');
Route::get('book-edit/{slug}', [BookController::class, 'edit'])->middleware('auth');
Route::post('book-edit/{slug}', [BookController::class, 'update'])->middleware('auth');
Route::get('book-delete/{slug}', [BookController::class, 'delete'])->middleware('auth');
Route::get('book-destroy/{slug}', [BookController::class, 'destroy'])->middleware('auth');
Route::get('book-deleted', [BookController::class, 'deletedBook'])->middleware('auth');
Route::get('book-restore/{slug}', [BookController::class, 'restore'])->middleware('auth');

Route::get('categories', [CategoryController::class, 'index'])->middleware('auth');
Route::get('categories-add', [CategoryController::class, 'add'])->middleware('auth');
Route::post('category-add', [CategoryController::class, 'store'])->middleware('auth');
Route::get('category-edit/{slug}', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('category-edit/{slug}', [CategoryController::class, 'update'])->middleware('auth');
Route::get('category-delete/{slug}', [CategoryController::class, 'delete'])->middleware('auth');
Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy'])->middleware('auth');
Route::get('category-deleted', [CategoryController::class, 'deletedCategory'])->middleware('auth');
Route::get('category-restore/{slug}', [CategoryController::class, 'restore'])->middleware('auth');

Route::get('users', [UserController::class, 'index'])->middleware('auth');

Route::get('book-rent', [BookRentController::class, 'index'])->middleware('auth');
Route::post('book-rent', [BookRentController::class, 'store'])->middleware('auth');

Route::get('rent-logs', [RentLogController::class, 'index'])->middleware('auth');

Route::get('book-return', [BookRentController::class, 'returnBook'])->middleware('auth');
Route::post('book-return', [BookRentController::class, 'saveReturnBook'])->middleware('auth');



