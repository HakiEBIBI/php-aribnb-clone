<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('signin');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }

    public function dologin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        return to_route('login')->withErrors([
            'email' => "l'email n'est pas valide",
        ])->onlyInput('email');


    }
}
