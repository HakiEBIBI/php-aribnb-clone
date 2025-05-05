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

Route::view('/home', 'home');

Route::view('/sign-up', 'signup');

Route::view('/sign-in', 'signin');

Route::view('/appartement-detail', 'appartement-detail');

Route::view('/appartement-edit', 'edit-appartement');

Route::view('/all-apartment', 'all-apartment');
