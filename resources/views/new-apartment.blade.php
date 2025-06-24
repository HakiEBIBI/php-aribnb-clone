<!doctype html>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places,maps,marker,geocoding&v=weekly"></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>création appartement</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>
@include('header')
<body class="bg-gray-100">
@include('error-and-succes-handling')

<div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Créer la Publication de son Appartement</h2>
        <form method="POST" action="{{ route('apartments.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom de l'appartement</label>
                <input type="text" id="nom" name="title"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Nom de l'appartement">
            </div>

            <div>
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" rows="4" name="description"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          placeholder="Description de l'appartement"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <div style="height: 800px" id="map"></div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <input type="hidden" name="address" id="address">
                <input type="hidden" name="city" id="city">
                <input type="hidden" name="postal_code" id="postal_code">
            </div>

            <div>
                <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix par nuit (CHF)</label>
                <input type="number" id="prix" name="price_per_night"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Prix par nuit">
            </div>
            <div>
                <label for="nombre_de_personnes" class="block text-gray-700 text-sm font-bold mb-2">Nombre maximum de
                    personnes</label>
                <input type="number" id="nombre_de_personnes" name="max_number_of_people"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Nombre maximum de personnes">
            </div>
            <div class="relative rounded-md shadow-sm mb-9 mt-4 ">
                <div id="image-inputs">
                    <div class="relative rounded-md shadow-sm mb-4 mt-4">
                        <label class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Choisir une image
                            <input type="file" name="images[]" class="sr-only" onchange="showAddButton(this)">
                        </label>
                        <span class="ml-2 text-gray-500 text-sm">Aucun fichier sélectionné</span>
                    </div>
                </div>

                <script>
                    function showAddButton(input) {
                        input.parentElement.nextElementSibling.textContent = input.files[0]?.name || 'Aucun fichier sélectionné';

                        if (!input.closest('.relative').nextElementSibling ||
                            !input.closest('.relative').nextElementSibling.classList.contains('add-image-btn')) {
                            const btn = document.createElement('button');
                            btn.type = 'button';
                            btn.textContent = 'Ajouter une autre image';
                            btn.className = 'add-image-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2 mb-4';
                            btn.onclick = addImageInput;
                            input.closest('.relative').after(btn);
                        }
                    }

                    function addImageInput() {
                        const container = document.getElementById('image-inputs');
                        const div = document.createElement('div');
                        div.className = 'relative rounded-md shadow-sm mb-4 mt-4';
                        div.innerHTML = `
        <label class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Choisir une image
            <input type="file" name="images[]" class="sr-only" onchange="showAddButton(this)">
        </label>
        <span class="ml-2 text-gray-500 text-sm">Aucun fichier sélectionné</span>
    `;
                        container.appendChild(div);
                    }
                </script>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    publier
                </button>
                <a href="{{ route('home') }}"
                   class="inline-block align-baseline font-semibold text-sm text-blue-red hover:text-blue-red">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
<script>
    let map;
    let marker;
    let geocoder;

    function initMap() {
        const initialLocation = {lat: 46.525426156486844, lng: 6.624099571477695};

        map = new google.maps.Map(document.getElementById("map"), {
            center: initialLocation,
            zoom: 14,
        });

        geocoder = new google.maps.Geocoder();

        marker = new google.maps.Marker({
            position: initialLocation,
            map: map,
            visible: true,
            draggable: true,
            animation: google.maps.Animation.DROP
        });

        map.addListener("click", handleMapClick);
    }

    async function handleMapClick(event) {
        const latLng = event.latLng;

        marker.setPosition(latLng);
        marker.setVisible(true);

        document.getElementById("latitude").value = latLng.lat();
        document.getElementById("longitude").value = latLng.lng();

        try {
            const response = await geocoder.geocode({location: latLng});
            if (response.results[0]) {
                const components = response.results[0].address_components;

                const street = components.find(c => c.types.includes("route"))?.long_name || '';
                const streetNumber = components.find(c => c.types.includes("street_number"))?.long_name || '';
                const city = components.find(c => c.types.includes("locality"))?.long_name || '';
                const postalCode = components.find(c => c.types.includes("postal_code"))?.long_name || '';

                document.getElementById("address").value = `${streetNumber} ${street}`.trim() || '';
                document.getElementById("city").value = city || '';
                document.getElementById("postal_code").value = postalCode || '';
            }
        } catch (error) {
            console.error('Erreur de géocodage:', error);
        }
    }

    window.onload = function () {
        const script = document.createElement("script");
        script.src = "https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initMap";
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    };
</script>
</body>
