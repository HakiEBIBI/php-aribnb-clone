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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet"/>
    <script src="https://flowbite.com/docs/flowbite.min.js"></script>
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
@include('error-and-succes-handling')

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
            </div>

            <form method="GET" action="{{ route('apartments.index') }}" class="space-y-6">

                <div class=" p-4">
                    <label for="checkin"
                           class="block text-gray-700 text-sm font-semibold mb-1 whitespace-nowrap">
                        Date d'arrivée et date de départ
                    </label>
                    <input type="text" id="checkin" name="dates"
                           placeholder="mettre une date"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-red-500 focus:outline-none text-gray-700">
                </div>

                <div>
                    <label for="city" class="text-lg font-semibold text-black mb-2 block">Ville</label>
                    <div style="height: 400px" id="map"></div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <input type="hidden" name="city" id="city">
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

                    <a href="{{ route('apartments.index') }}"
                       class="ml-4 text-gray-600 underline hover:text-gray-800">
                        Réinitialiser
                    </a>
                </div>

            </form>

        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        @forelse ($apartments as $apartment)
            <a href="{{ route('apartments.show', $apartment) }}"
               class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white">
                <div id="carousel-{{ $apartment->id }}" class="relative w-full h-48" data-carousel="slide">
                    <div class="relative h-48 overflow-hidden rounded-lg">
                        @foreach($apartment->images as $index => $image)
                            <div class="{{ $index === 0 ? '' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('storage/' . $image->path) }}"
                                     class="absolute block w-full h-full object-cover"
                                     alt="Apartment image {{ $index + 1 }}"/>
                            </div>
                        @endforeach
                    </div>
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-2 left-1/2">
                        @foreach($apartment->images as $index => $image)
                            <button type="button" class="w-3 h-3 rounded-full" aria-label="Slide {{ $index + 1 }}"
                                    data-carousel-slide-to="{{ $index }}"></button>
                        @endforeach
                    </div>
                    <button type="button"
                            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </span>
                    </button>
                    <button type="button"
                            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                            data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </span>
                    </button>
                </div>
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
    <div class="mt-6">
        {{ $apartments->links() }}
    </div>
</div>
<script>
    let map;
    let marker;
    let geocoder;

    async function initMap() {
        const initialLocation = {lat: 46.525426156486844, lng: 6.624099571477695};

        map = new google.maps.Map(document.getElementById("map"), {
            center: initialLocation,
            zoom: 14,
            mapId: '{{ env('GOOGLE_API_KEY') }}',
            zoomControl: true,
            mapTypeControl: false,
            scaleControl: true,
            streetViewControl: true,
            rotateControl: false,
            fullscreenControl: true,
            tilt: 45,
            heading: 0,
            gestureHandling: "greedy",
            disableDefaultUI: false
        });

        geocoder = new google.maps.Geocoder();

        const pinElement = new google.maps.marker.PinElement({
            scale: 1.2,
        });

        marker = new google.maps.marker.AdvancedMarkerElement({
            map,
            position: initialLocation,
            content: pinElement.element,
            draggable: true,
            title: "Sélectionnez un emplacement"
        });

        marker.addListener("dragend", (event) => {
            updatePosition(marker.position);
        });

        map.addListener("click", handleMapClick);
    }

    async function handleMapClick(event) {
        marker.position = event.latLng;
        updatePosition(event.latLng);
    }

    async function updatePosition(position) {
        document.getElementById("latitude").value = position.lat();
        document.getElementById("longitude").value = position.lng();

        try {
            const response = await geocoder.geocode({location: position});
            if (response.results[0]) {
                const components = response.results[0].address_components;
                const city = components.find(c => c.types.includes("locality"))?.long_name || '';

                const cityInput = document.getElementById("city");
                cityInput.value = city;
                console.log("City updated:", city);
            }
        } catch (error) {
            console.error("Geocoding failed:", error);
        }
    }
</script>

<script>
    window.onload = function () {
        const script = document.createElement("script");
        script.src = "https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places,marker&callback=initMap&v=beta";
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    };
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#checkin", {
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",
        });
    });
</script>

</body>
</html>
