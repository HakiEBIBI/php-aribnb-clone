<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit apartment</title>
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
@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
<div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Modifier l'appartement</h2>
        <form method="POST" action="{{ route('apartments.update', ['apartment' => $apartment->id]) }}"
              enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom de l'appartement</label>
                <input type="text" id="nom" name="title"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Nom de l'appartement" value="{{ $apartment->title }}">
            </div>
            <div>
                <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse</label>
                <input type="text" id="adresse" name="address"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Adresse complète" value="{{ $apartment->address }}">
            </div>
            <div>
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" rows="4" name="description"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          placeholder="Description de l'appartement">{{ $apartment->description }}</textarea>
            </div>
            <div>
                <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix par nuit (CHF)</label>
                <input type="number" id="prix" name="price_per_night"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Prix par nuit" value="{{ round($apartment->price_per_night) }}">
            </div>
            <div>
                <label for="nombre_de_personnes" class="block text-gray-700 text-sm font-bold mb-2">Nombre maximum de
                    personnes</label>
                <input type="number" id="nombre_de_personnes" name="max_number_of_people"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Nombre maximum de personnes" value="{{ $apartment->max_number_of_people }}">
            </div>
            <div class="relative rounded-md shadow-sm mb-9 mt-4 ">
                <label for="file-upload"
                       class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Choisir une image
                </label>
                <input id="file-upload" type="file" accept="image/*" class="sr-only" name="image"
                       onchange="document.getElementById('file-name').textContent = this.files[0] ? this.files[0].name : 'Aucun fichier sélectionné'">
                <span id="file-name" class="ml-2 text-gray-500 text-sm">{{ $apartment->image }}</span>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Enregistrer les modifications
                </button>
                <a href="{{route('home')}}"
                   class="inline-block align-baseline font-semibold text-sm text-blue-red hover:text-blue-red">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
</body>
