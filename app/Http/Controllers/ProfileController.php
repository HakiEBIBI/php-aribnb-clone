<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show(Request $request)
    {
        $id = $request->user()->id;
        $user = User::find($id);

        $reservations = $user->reservations()->get();
        $apartments = $user->apartments()->get();

        return view('account-detail', compact('user', 'reservations', 'apartments'));
    }
}
