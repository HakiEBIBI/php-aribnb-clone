<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ApartmentController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $apartments = Apartment::orderBy('created_at', 'desc')->simplePaginate(12);
        return view('all-apartments', compact('apartments'));
    }

    public function create()
    {
        return view('new-apartment');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'postal_code' => 'required',
            'price_per_night' => 'required',
            'max_number_of_people' => 'required',
            'address' => 'required',
            'city' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
        ]);

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
        return view('appartement-detail', compact('apartment'));
    }

    public function edit(Apartment $apartment)
    {
        $this->authorize('update', $apartment);
        return view('edit-appartement', compact('apartment'));
    }

    public function showAll()
    {
        $apartments = Apartment::orderBy('created_at', 'desc')->paginate(12);;
        return view('all-apartments', compact('apartments'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        $this->authorize('update', $apartment);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'postal_code' => 'required|string',
            'price_per_night' => 'required|numeric',
            'max_number_of_people' => 'required|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
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

    public function filter(Request $request)
    {
        $query = Apartment::query();

        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        if ($request->filled('priceFrom')) {
            $query->where('price_per_night', '>=', $request->priceFrom);
        }

        if ($request->filled('priceTo')) {
            $query->where('price_per_night', '<=', $request->priceTo);
        }

        $apartments = $query->get();
        return view('all-apartments', compact('apartments'));
    }
}
