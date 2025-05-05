<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
<div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Modifier l'appartement</h2>
        <form class="space-y-4">
            <div>
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom de l'appartement</label>
                <input type="text" id="nom"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Nom de l'appartement">
            </div>
            <div>
                <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse</label>
                <input type="text" id="adresse"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Adresse complète">
            </div>
            <div>
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" rows="4"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          placeholder="Description de l'appartement"></textarea>
            </div>
            <div>
                <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix par nuit (CHF)</label>
                <input type="number" id="prix"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Prix par nuit">
            </div>
            <div>
                <label for="nombre_de_chambres" class="block text-gray-700 text-sm font-bold mb-2">Nombre de
                    chambres</label>
                <input type="number" id="nombre_de_chambres"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Nombre de chambres">
            </div>
            <div>
                <label for="nombre_de_personnes" class="block text-gray-700 text-sm font-bold mb-2">Nombre maximum de
                    personnes</label>
                <input type="number" id="nombre_de_personnes"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Nombre maximum de personnes">
            </div>
            <div class="relative rounded-md shadow-sm mb-9 mt-4 ">
                <label for="file-upload"
                       class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Choisir une image
                </label>
                <input id="file-upload" type="file" class="sr-only"
                       onchange="document.getElementById('file-name').textContent = this.files[0] ? this.files[0].name : 'Aucun fichier sélectionné'">
                <span id="file-name" class="ml-2 text-gray-500 text-sm">Aucun fichier sélectionné</span>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Enregistrer les modifications
                </button>
                <a href="#" class="inline-block align-baseline font-semibold text-sm text-blue-red hover:text-blue-red">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
</body>
