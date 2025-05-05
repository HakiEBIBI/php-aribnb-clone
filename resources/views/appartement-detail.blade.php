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
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Beau-Rivage Palace</h1>

    <div class="flex justify-center mb-9">
        <img class="w-96 rounded-lg shadow-md"
             src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/467043153.jpg?k=f320d1c69189e4426595b9f848708f49947c0bd042d8e45cea037daed7ecc321&o=&hp=1"
             alt="Détail de l'Hôtel Beau-Rivage Palace">
    </div>

    <p class="text-lg text-black mb-4">
        L'Hôtel Beau-Rivage Palace est un établissement de luxe 5 étoiles magnifiquement situé sur les rives paisibles
        du lac Léman.
        Il est mondialement reconnu pour son architecture emblématique de la Belle Époque, qui évoque une élégance et un
        charme d'antan.
        Les clients peuvent se détendre et se ressourcer dans son spa exceptionnel, qui offre une gamme étendue de soins
        et de thérapies.
        Pour les amateurs de gastronomie, le restaurant étoilé de l'hôtel propose une expérience culinaire inoubliable
        avec des plats raffinés.
        L'emplacement privilégié de l'hôtel offre également des vues imprenables sur le lac et les montagnes
        environnantes, créant un cadre idyllique pour un séjour mémorable.
    </p>

    <p class="text-2xl font-bold text-red-400">600.- / nuit</p>
</div>
</body>
</html>
