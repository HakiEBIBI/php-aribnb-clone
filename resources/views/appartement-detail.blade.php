<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hotel detail</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>
@include('header')
<body>

<div class="container mx-auto px-4 py-8 text-center">
    @auth
        @if (auth()->id() === $apartment->user_id)
            <form action="{{ route('delete-apartment', $apartment) }}" method="POST"
                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet appartement ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                    Supprimer l'appartement
                </button>
            </form>
        @endif
    @endauth
    <h1 class="text-3xl font-bold text-gray-800 mt-8 mb-6">{{ $apartment->title }}</h1>

    <div class="flex justify-center mb-9">
        <img class="w-96 rounded-lg shadow-md"
             src="{{ asset('storage/' . $apartment->image) }}"
             alt="{{ $apartment->title }}">
    </div>

    <p class="text-lg text-black mb-4">
        {{ $apartment->description }}
    </p>

    <label class="font-bold "> Ville</label>
    <p class="text-lg text-black mb-4">
        {{ $apartment->city }}
    </p>

    <label class="font-bold ">Code postal</label>
    <p class="text-lg text-black mb-4">
        {{ $apartment->postal_code }}
    </p>

    <label class="font-bold">Adresse</label>
    <p class="text-lg text-black mb-4">
        {{ $apartment->address }}
    </p>

    <p class="text-2xl font-bold text-red-400 mb-5">{{ round($apartment->price_per_night) }}.- / nuit</p>
    @auth
        @if (auth()->id() === $apartment->user_id)
            <a href="{{ route('edit-apartment', ['apartment' => $apartment->id]) }}"
               class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                Modifier
            </a>
        @endif
    @endauth
    <div class="bg-white shadow-md rounded-lg p-6 sticky top-4 w-90 m-auto mt-9">
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Réserver</h2>
            <p class="text-gray-700 mr-2"><strong>{{ round($apartment->price_per_night) }} .-</strong> / nuit</p>
        </div>

        <div class="mb-4">
            <label for="checkin" class="block text-gray-700 text-sm font-bold mb-2">Arrivée</label>
            <input type="date" id="checkin"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="checkout" class="block text-gray-700 text-sm font-bold mb-2">Départ</label>
            <input type="date" id="checkout"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="guests" class="block text-gray-700 text-sm font-bold mb-2">Voyageurs</label>
            <select id="guests"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <button
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg w-full focus:outline-none focus:shadow-outline"
            type="button">
            Réserver
        </button>
    </div>
</div>
</body>
</html>
