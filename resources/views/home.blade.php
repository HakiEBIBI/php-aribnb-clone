<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

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
@include('error-and-succes-handling')

<div class="container mx-auto px-4 py-8">
    <section class="mb-12">
        <h2 class="text-3xl font-semibold text-black mb-4">Nos 3 Appartements les Plus Choisis</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($topApartments as $apartment)
                <a href="{{ route('apartments.show', $apartment) }}"
                   class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                    <img class="w-full h-48 object-cover"
                         src="{{ asset('storage/' . $apartment->image) }}"
                         alt="{{ $apartment->title }}">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $apartment->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $apartment->description }}</p>
                        <p class="text-gray-700"><strong class="font-bold">{{ round($apartment->price_per_night) }}
                                .-</strong> / nuit</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-black-800 mb-6">Nos Appartements par Villes</h1>
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($apartmentsByCity as $city => $apartments)
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{ $city }}</h2>
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Nos Suggestions à {{ $city }}</h3>
                    <div class="space-y-4">
                        @foreach ($apartments as $apartment)
                            <a href="{{ route('apartments.show', $apartment) }}"
                               class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                                <img class="w-full h-40 object-cover"
                                     src="{{ asset('storage/' . $apartment->image) }}"
                                     alt="{{ $apartment->title }}">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $apartment->title }}</h3>
                                    <p class="text-sm text-gray-600">{{ $apartment->description }}</p>
                                    <p class="text-gray-700"><strong
                                            class="font-bold">{{ round($apartment->price_per_night) }}.-</strong> / nuit
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    </div>
</div>
</body>
</html>
