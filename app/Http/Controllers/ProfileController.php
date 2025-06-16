<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show()
    {

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $reservations = $user->reservations()->get();
        $apartments = $user->apartments()->get();

        return view('account-detail', compact('user', 'reservations', 'apartments'));
    }
}
