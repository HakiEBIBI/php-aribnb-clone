<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account détail</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>
@include('header')
<body>
@include('error-and-succes-handling')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Mon Compte</h1>

        <div class="mb-8">
            <h2 class="text-xl font-semibold text-red-500 mb-4">Informations personnelles</h2>
            <div class="bg-gray-50 p-4 rounded-lg">
                <p><span class="font-semibold">Nom:</span> {{ $user->name }}</p>
                <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                <p><span class="font-semibold">Membre depuis:</span> {{ $user->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-red-500">Mes Appartements</h2>
                <a href="{{ route('apartments.create') }}"
                   class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                    + Ajouter
                </a>1oerai
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($apartments as $apartment)
                    <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition">
                        <h3 class="font-semibold">{{ $apartment->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $apartment->city }}</p>
                        <p class="text-gray-600 text-sm mb-2">{{round($apartment->price_per_night )}}€ / nuit</p>
                        <a href="{{ route('apartments.show', $apartment) }}"
                           class="text-red-500 text-sm hover:text-red-700">
                            Voir détails →
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500">Aucun appartement trouvé.</p>
                @endforelse
            </div>
        </div>
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-red-500 mb-4">Mes Réservations</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3">
                @forelse($reservations as $reservation)
                    <div class="bg-gray-50 rounded-lg p-3 text-sm">
                        <div class="flex justify-between items-start gap-2">
                            <div>
                                <h3 class="font-semibold">{{ $reservation->apartment->title ?? 'N/A' }}</h3>
                                <div class="text-gray-600">
                                    <p>Du: {{ $reservation->arrival_date }}</p>
                                    <p>Au: {{ $reservation->departure_date }}</p>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <a href="{{ route('reservations.show', $reservation->id) }}"
                                       class="text-red-500 hover:text-red-700 text-xs">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>Modifier</span>
                                    </a>
                                    <form action="{{ route('reservations.destroy', $reservation) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        supprimer la réservation
                                    </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Aucune réservation trouvée.</p>
                @endforelse
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('apartments.index') }}"
               class="border border-red-500 text-red-500 px-4 py-2 rounded hover:bg-red-50 transition">
                Voir tous les appartements
            </a>
        </div>
    </div>
</div>
</body>
</html>
