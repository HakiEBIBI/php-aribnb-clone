<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $topApartments = Apartment::inRandomOrder()->take(3)->get();

        $apartmentsByCity = Apartment::select('city')
            ->distinct()
            ->take(3)
            ->get()
            ->mapWithKeys(function ($item) {
                $apartments = Apartment::where('city', $item->city)->take(2)->get();
                return [$item->city => $apartments];
            });

        return view('home', [
            'topApartments' => $topApartments,
            'apartmentsByCity' => $apartmentsByCity,
        ]);
    }
}
