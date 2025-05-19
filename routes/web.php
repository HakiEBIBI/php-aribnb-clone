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

Route::get('/appartement-detail/{id}', [ApartmentController::class, 'appartementDetail'])->name('apartment.show');

Route::get('/appartement-detail/edit-appartement/{apartment}', [ApartmentController::class, 'appartementEdit'])->can('update', 'apartment')->name('edit-apartment');
Route::patch('/appartement-detail/edit-appartement/{id}', [ApartmentController::class, 'PatchApartment'])->name('PatchApartment');

Route::view('/all-apartment', 'all-apartments')->name('all-apartments');
Route::get('/all-apartements', [ApartmentController::class, 'showAll'])->name('all-apartments');

Route::view('/new-apartment', 'new-apartment')->name('new-apartment')->middleware('auth');
Route::post('/new-apartment', [\App\Http\Controllers\ApartmentController::class, 'postApartment'])->middleware('auth')->name('post-apartment');

Route::delete('/appartement-detail/edit-appartement/apartment-delete/{apartment}', [ApartmentController::class, 'apartmentDelete'])
    ->can('update', 'apartment')
    ->name('delete-apartment');

Route::get('/appartements', [ApartmentController::class, 'filter'])->name('appartements.index');
