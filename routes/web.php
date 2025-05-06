<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function (\Illuminate\Http\Request $request) {
    return [
        "name" => $request->input("name", "John Doe"),
        "articles" => "Articles 1"
    ];
});

Route::view('/home', 'home')->name('home');

Route::view('/sign-up', 'signup')->name('sign-up');
Route::post('/sign-up', [\App\Http\Controllers\SignUpController::class, 'signup'])->name('signup');

Route::view('/appartement-detail', 'appartement-detail')->name('apartment-detail');

Route::view('/appartement-edit', 'edit-appartement')->middleware('auth');

Route::view('/all-apartment', 'all-apartment')->name('all-apartment');

Route::view('/sign-in', 'sign-in')->name('sign-in');
Route::get('/sign-in', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::post('/sign-in', [\App\Http\Controllers\AuthController::class, 'dologin']);
