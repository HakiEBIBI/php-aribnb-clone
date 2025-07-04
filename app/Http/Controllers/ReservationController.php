<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Mail\MailReservation;
use App\Models\Apartment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
        $apartment = Apartment::findOrFail($validated['apartment_id']);

        $reservation = $apartment->reservations()->create([
            'user_id' => auth()->id(),
            'arrival_date' => $validated['arrival_date'],
            'departure_date' => $validated['departure_date'],
            'traveler_number' => $validated['traveler_number'],
        ]);

        $total_price = $apartment->price_per_night * \Carbon\Carbon::parse($validated['arrival_date'])->diffInDays($validated['departure_date']);

        Mail::to(auth()->user()->email)->send(
            new MailReservation(
                name: auth()->user()->name,
                action: 'created',
                apartmentTitle: $apartment->title,
                arrival_date: $validated['arrival_date'],
                departure_date: $validated['departure_date'],
                apartment: $apartment,
                total_price: $total_price,
                reservation: $reservation
            )
        );

        return redirect()->route('apartments.index')
            ->with('success', 'Vous avez créé une nouvelle reservation.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        Gate::authorize('manage-reservation', $reservation);

        $otherReservations = Reservation::where('apartment_id', $reservation->apartment_id)
            ->where('id', '!=', $reservation->id)
            ->get();

        return view('reservations-edit', [
            'reservation' => $reservation,
            'apartment' => $reservation->apartment,
            'otherReservations' => $otherReservations
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        Gate::authorize('manage-reservation', $reservation);

        $validated = $request->validate([
            'dates' => 'required|string',
            'traveler_number' => 'required|integer|min:1'
        ]);

        $dates = explode(' to ', $validated['dates']);
        $arrival_date = $dates[0];
        $departure_date = $dates[1];

        $reservation->update([
            'arrival_date' => $arrival_date,
            'departure_date' => $departure_date,
            'traveler_number' => $validated['traveler_number']
        ]);

        Mail::to(auth()->user()->email)->send(
            new MailReservation(
                name: auth()->user()->name,
                action: 'updated',
                apartmentTitle: $reservation->apartment->title,
                arrival_date: $arrival_date,
                departure_date: $departure_date,
                apartment: $reservation->apartment,
                total_price: $reservation->apartment->price_per_night * \Carbon\Carbon::parse($arrival_date)->diffInDays($departure_date),
                reservation: $reservation
            )
        );

        return redirect()->route('accountDetail')
            ->with('success', 'Réservation modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        Gate::authorize('manage-reservation', $reservation);

        $user = auth()->user();
        $apartment = $reservation->apartment;
        $arrival_date = $reservation->arrival_date;
        $departure_date = $reservation->departure_date;

        $total_price = $apartment->price_per_night * \Carbon\Carbon::parse($arrival_date)->diffInDays($departure_date);

        $reservation->delete();

        Mail::to($user->email)->send(
            new MailReservation(
                name: $user->name,
                action: 'deleted',
                apartmentTitle: $apartment->title,
                arrival_date: $arrival_date,
                departure_date: $departure_date,
                apartment: $apartment,
                total_price: $total_price,
                reservation: $reservation
            )
        );

        return redirect()->route('accountDetail')
            ->with('success', 'Réservation supprimer avec succès.');
    }
}
