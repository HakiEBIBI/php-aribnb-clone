<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $topApartments = Apartment::withCount('reservations')
            ->orderBy('reservations_count', 'desc')
            ->take(3)
            ->get();

        $allApartmentsByCity = Apartment::all()->groupBy('city');

        $apartmentsByCity = collect([]);
        $cityCount = 0;

        foreach ($allApartmentsByCity as $city => $apartments) {
            if ($cityCount >= 3) {
                break;
            }
            $apartmentsByCity->put($city, $apartments->take(3));
            $cityCount++;
        }

        return view('home', compact('topApartments', 'apartmentsByCity'));
    }
}
