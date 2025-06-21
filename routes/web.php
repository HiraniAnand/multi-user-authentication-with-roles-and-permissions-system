<?php

use Illuminate\Support\Facades\Route;
use App\Http\middleware\isAdmin;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('welcome', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('throttle:2,1');
    
    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register')->middleware('throttle:2,1');
});
Auth::routes();

Route::get('auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
