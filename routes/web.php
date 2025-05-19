<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\HomeController;
use App\Models\Apartment;
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
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::view('/sign-up', 'signup')->name('sign-up');
Route::post('/sign-up', [\App\Http\Controllers\SignUpController::class, 'signup'])->name('signup');

Route::view('/sign-in', 'sign-in')->name('sign-in');
Route::get('/sign-in', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/sign-in', [\App\Http\Controllers\AuthController::class, 'dologin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::view('/all-apartment', 'all-apartments')->name('all-apartments');
Route::get('/all-apartements', [ApartmentController::class, 'showAll'])->name('all-apartments');

Route::view('/new-apartment', 'new-apartment')->name('new-apartment')->middleware('auth');

Route::get('/appartements', [ApartmentController::class, 'filter'])->name('appartements.index');

Route::resource('apartments', ApartmentController::class)->middleware('auth');
