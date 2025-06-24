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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet"/>
    <script src="https://flowbite.com/docs/flowbite.min.js"></script>
</head>
@include('header')
<body class="bg-gray-50">
@include('error-and-succes-handling')

<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex justify-end mb-6">
        @auth
            @if (auth()->id() === $apartment->user_id)
                <div class="flex space-x-4">
                    <a href="{{ route('apartments.edit', $apartment) }}"
                       class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Modifier
                    </a>
                    <form action="{{ route('apartments.destroy', $apartment) }}" method="POST"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet appartement ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Supprimer l'appartement
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        <div class="lg:w-2/3">
            <h1 class="text-4xl font-bold text-gray-800 mb-6">{{ $apartment->title }}</h1>

            <div class="mb-8 overflow-hidden rounded-xl shadow-lg">
                <div id="apartment-carousel" class="relative w-full mb-10" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-96 overflow-hidden rounded-lg">
                        @foreach($apartment->images as $index => $image)
                            <div class="hidden duration-700 ease-in-out {{ $index === 0 ? 'block' : '' }}" data-carousel-item>
                                <img src="{{ asset('storage/' . $image->path) }}"
                                     alt="Image {{ $index + 1 }}"
                                     class="absolute block w-full h-full object-cover top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" />
                            </div>
                        @endforeach
                    </div>

                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
                        @foreach($apartment->images as $index => $image)
                            <button type="button"
                                    class="w-3 h-3 rounded-full"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"
                                    data-carousel-slide-to="{{ $index }}">
                            </button>
                        @endforeach
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 6 10">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
                    </button>
                    <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 6 10">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Description</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    {{ $apartment->description }}
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Détails du logement</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Ville -->
                    <div class="flex items-center">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Ville</p>
                            <p class="text-lg text-gray-800">{{ $apartment->city }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Code postal</p>
                            <p class="text-lg text-gray-800">{{ $apartment->postal_code }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Adresse</p>
                            <p class="text-lg text-gray-800">{{ $apartment->address }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Capacité</p>
                            <p class="text-lg text-gray-800">{{ $apartment->max_number_of_people }} personnes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3">
            <form method="post" action="{{ route('reservations.store') }}">
                @csrf
                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">

                <div class="bg-white shadow-lg rounded-xl p-6 sticky top-4">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ round($apartment->price_per_night) }}.-</h2>
                            <p class="text-gray-600">par nuit</p>
                        </div>
                        <div class="bg-red-100 text-red-400 px-3 py-1 rounded-full font-medium text-sm">
                            Appartement
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden mb-6">
                        <div class="p-4">
                            <label for="checkin" class="block text-gray-700 text-sm font-semibold mb-1">Date d'arrivée et départ</label>
                            <input type="text" id="checkin" name="dates" placeholder="mettre une date"
                                   class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-500 focus:outline-none text-gray-700">
                        </div>
                        <div class="border-t border-gray-200 p-4">
                            <label for="guests" class="block text-gray-700 text-sm font-semibold mb-2">Voyageurs</label>
                            <select id="guests" name="traveler_number"
                                    class="w-full bg-transparent border-0 p-0 focus:ring-0 text-gray-700">
                                @for ($i = 1; $i <= $apartment->max_number_of_people; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-4 px-6 rounded-lg w-full focus:outline-none focus:shadow-outline transition duration-300 flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Réserver
                    </button>

                    <div class="mt-6 space-y-4">
                        <div class="border-t border-gray-200 pt-4 flex justify-between">
                            <p class="font-bold">Prix</p>
                            <p class="font-bold">{{ round($apartment->price_per_night) }}.-</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#checkin", {
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",
            disable: [
                    @foreach($reservations as $reservation)
                {
                    from: "{{ $reservation->arrival_date }}",
                    to: "{{ $reservation->departure_date }}"
                },
                @endforeach
            ]
        });
    });
</script>
</body>
</html>
