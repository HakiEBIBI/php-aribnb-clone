<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApartmentRequest;
use App\Models\Apartment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ApartmentController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $query = Apartment::query();

        if ($request->filled('dates')) {
            $dateparts = explode(' to ', $request->dates);
            $arrival_date = $dateparts[0] ?? null;
            $departure_date = $dateparts[1] ?? null;

            if ($arrival_date && $departure_date) {
                $query->whereDoesntHave('reservations', function($q) use ($arrival_date, $departure_date) {
                    $q->where(function($q) use ($arrival_date, $departure_date) {
                        $q->where(function($q) use ($arrival_date, $departure_date) {
                            $q->where('arrival_date', '<=', $departure_date)
                                ->where('departure_date', '>=', $arrival_date);
                        });
                    });
                });
            }
        };
        if ($request->filled('city')) {
            $query->where('city', '=', $request->city);

        }
        if ($request->filled('priceFrom')) {
            $query->where('price_per_night', '>=', $request->priceFrom);
        }

        if ($request->filled('priceTo')) {
            $query->where('price_per_night', '<=', $request->priceTo);
        }
        $apartments = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('all-apartments', compact('apartments'));
    }

    public function create()
    {
        return view('new-apartment');
    }

    public function store(StoreApartmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $imagePath = $request->file('image')->store('apartments', 'public');

        $apartment = new Apartment();
        $apartment->fill($validated);
        $apartment->image = $imagePath;
        $apartment->user_id = auth()->id();
        $apartment->save();

        return redirect()->route('apartments.show', $apartment)
            ->with('success', 'Appartement créé avec succès.');
    }

    public function show(Apartment $apartment)
    {
        $reservationBooking = Reservation::where('apartment_id', $apartment->id)->get();
        return view('appartement-detail', compact('apartment'), ['reservations' => $reservationBooking]);
    }

    public function edit(Apartment $apartment)
    {
        $this->authorize('update', $apartment);
        return view('edit-appartement', compact('apartment'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        $this->authorize('update', $apartment);

        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price_per_night' => ['required', 'integer'],
            'max_number_of_people' => ['required', 'integer'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if ($request->hasFile('image')) {
            $apartment->removePhotoFromDisk();
            $path = $request->file('image')->store('apartments', 'public');
            $validated['image'] = $path;
        }

        $apartment->update($validated);

        return redirect()->route('apartments.show', $apartment)
            ->with('success', 'Appartement mis à jour avec succès.');
    }

    public function destroy(Apartment $apartment)
    {
        $this->authorize('update', $apartment);

        $apartment->removePhotoFromDisk();
        $apartment->delete();

        return redirect()->route('apartments.index')->with('success', 'Appartement supprimé avec succès');
    }
}
