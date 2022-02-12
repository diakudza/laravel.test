<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\MainController::class,'index'])->name('home');
Route::get('/search',[\App\Http\Controllers\MainController::class,'search'])->name('search');

Route::resource('/ticket' , \App\Http\Controllers\TicketController::class)->middleware('auth');;
Route::resource('/comment' , \App\Http\Controllers\CommentController::class)->middleware('auth');;

Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth')->middleware('guest');
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout')->middleware('auth');
