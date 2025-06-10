<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::view('/sign-up', 'signup')->name('sign-up');
Route::post('/sign-up', [SignUpController::class, 'signup'])->name('signup');

Route::view('/sign-in', 'sign-in')->name('sign-in');
Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
Route::post('/sign-in', [AuthController::class, 'dologin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('apartments', ApartmentController::class)->middleware('auth');

Route::resource('reservations', ReservationController::class)->middleware('auth');
