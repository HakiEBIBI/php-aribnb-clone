<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Apartment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();

        $apartment = Apartment::findOrFail($request->input('apartment_id'));
        $apartment->reservations()->create([
            'user_id' => auth()->id(),
            'arrival_date' => $validated['arrival_date'],
            'departure_date' => $validated['departure_date'],
            'traveler_number' => $validated['traveler_number'],
        ]);

        return redirect()->route('apartments.index')
            ->with('success', 'Vous avez créé une nouvelle reservation.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function disableDatePicker()
    {
        $reservations = Reservation::where('apartment_id', );
    }
}
