<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    //
    public function appartementDetail($id)
    {
        $apartment = Apartment::findOrFail($id);

        return view('appartement-detail', compact('apartment'));

    }

    public function appartementEdit(Apartment $apartment)
    {
        return view('edit-appartement', compact('apartment'));
    }

    public function PatchApartment(Request $request, $id)
    {
        $apartment = Apartment::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'postal_code' => 'required|string',
            'price_per_night' => 'required|numeric',
            'max_number_of_people' => 'required|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        if ($request->hasFile('image')) {
            $this->removephoto($id);
            $path = $request->file('image')->store('apartments', 'public');
            $validated['image'] = $path;
        }
        $apartment->update($validated);
        return redirect()->route('apartment.show', ['id' => $apartment->id])
            ->with('success', 'Appartement mis à jour avec succès.');
    }

    private function removephoto($id)
    {
        $apartment = Apartment::findOrFail($id);

        if ($apartment->image && Storage::disk('public')->exists($apartment->image)) {
            Storage::disk('public')->delete($apartment->image);
        }

    }

    public function postApartment(Request $request)
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
        $apartment->title = $validated['title'];
        $apartment->description = $validated['description'];
        $apartment->postal_code = $validated['postal_code'];
        $apartment->price_per_night = $validated['price_per_night'];
        $apartment->max_number_of_people = $validated['max_number_of_people'];
        $apartment->address = $validated['address'];
        $apartment->city = $validated['city'];
        $apartment->image = $imagePath;
        $apartment->user_id = auth()->id();

        $apartment->save();

        return redirect()->route('apartment.show', ['id' => $apartment->id])
            ->with('success', 'Appartement créé avec succès.');
    }

    public function apartmentDelete(Apartment $apartment)
    {

        if ($apartment->image && Storage::disk('public')->exists($apartment->image)) {
            Storage::disk('public')->delete($apartment->image);
        }

        $apartment->delete();

        return redirect()->route('home')->with('success', 'Appartement supprimé avec succès');

    }

    public function showAll()
    {
        $apartments = Apartment::orderBy('created_at', 'desc')->simplepaginate(12);
        return view('all-apartments', compact('apartments'));
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
