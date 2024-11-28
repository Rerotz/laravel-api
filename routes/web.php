<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});


Route::view('/register', 'register')->name('register.form');
Route::view('/login', 'login')->name('login.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
Route::get('/profile', [AuthController::class, 'userProfile'])->middleware('auth:api')->name('profile');
