<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tous les appartements</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
@include('header')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButton = document.getElementById('filterButton');
        const filterSection = document.getElementById('filterOptions');

        filterButton.addEventListener('click', () => {
            filterSection.classList.toggle('hidden');
        });
    });
</script>

<body>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-black-800">Tous nos Appartements</h1>
        <button id="filterButton"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Filtrer
        </button>
    </div>

    <div id="filterOptions" class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Filtrer par</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-black mb-2">Dates</h3>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="dateFrom" class="block text-gray-700 text-sm font-bold mb-2">Du</label>
                        <input type="date" id="dateFrom" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                    <div class="w-1/2">
                        <label for="dateTo" class="block text-gray-700 text-sm font-bold mb-2">Au</label>
                        <input type="date" id="dateTo" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                </div>
            </div>

            <form method="GET" action="{{ route('appartements.index') }}" class="space-y-6">

                <!-- Ville -->
                <div>
                    <label for="city" class="text-lg font-semibold text-black mb-2 block">Ville</label>
                    <select id="city" name="city" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        <option value="">-- Choisir une ville --</option>
                        <option value="lausanne" {{ request('city') == 'lausanne' ? 'selected' : '' }}>Lausanne</option>
                        <option value="geneve" {{ request('city') == 'geneve' ? 'selected' : '' }}>Genève</option>
                        <option value="zurich" {{ request('city') == 'zurich' ? 'selected' : '' }}>Zurich</option>
                        <option value="bern" {{ request('city') == 'bern' ? 'selected' : '' }}>Paris</option>
                    </select>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-black mb-2">Prix</h3>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="priceFrom" class="block text-gray-700 text-sm font-bold mb-2">De (CHF)</label>
                            <input name="priceFrom" type="number" id="priceFrom"
                                   value="{{ request('priceFrom') }}"
                                   class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                        <div class="w-1/2">
                            <label for="priceTo" class="block text-gray-700 text-sm font-bold mb-2">À (CHF)</label>
                            <input name="priceTo" type="number" id="priceTo"
                                   value="{{ request('priceTo') }}"
                                   class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Filtrer
                    </button>

                    <a href="{{ route('appartements.index') }}"
                       class="ml-4 text-gray-600 underline hover:text-gray-800">
                        Réinitialiser
                    </a>
                </div>

            </form>

        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        @forelse ($apartments as $apartment)
            <a href="{{ route('apartment.show', $apartment->id) }}"
               class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white">
                <img class="w-full h-48 object-cover"
                     src="{{ $apartment->image ? asset('storage/' . $apartment->image) : 'https://via.placeholder.com/400x300' }}"
                     alt="{{ $apartment->title }}">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $apartment->title }}</h3>
                    <p class="text-sm text-gray-600 mb-2">
                        {{ \Illuminate\Support\Str::limit($apartment->description, 100) }}
                    </p>
                    <p class="text-gray-700"><strong class="font-bold">{{ round($apartment->price_per_night) }}
                            .-</strong> / nuit</p>
                </div>
            </a>
        @empty
            <p class="text-gray-700 col-span-full">Aucun appartement disponible.</p>
        @endforelse
    </div>
    {{ $apartments->links() }}
</div>
</body>
</html>
