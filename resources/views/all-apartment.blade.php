<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tout les appartements</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>
@include('header')
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
                        <input type="date" id="dateFrom"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="w-1/2">
                        <label for="dateTo" class="block text-gray-700 text-sm font-bold mb-2">Au</label>
                        <input type="date" id="dateTo"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
            </div>

            <div>
                <label for="city" class="text-lg font-semibold text-black mb-2">Ville</label>
                <select id="city"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">-- Choisir une ville --</option>
                    <option value="lausanne">Lausanne</option>
                    <option value="geneve">Genève</option>
                    <option value="zurich">Zurich</option>
                    <option value="bern">Paris</option>
                </select>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-black mb-2">Prix</h3>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="priceFrom" class="block text-gray-700 text-sm font-bold mb-2">De (CHF)</label>
                        <input type="number" id="priceFrom"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="w-1/2">
                        <label for="priceTo" class="block text-gray-700 text-sm font-bold mb-2">À (CHF)</label>
                        <input type="number" id="priceTo"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
            </div>

            <button
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button">
                Appliquer les filtres
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/467043153.jpg?k=f320d1c69189e4426595b9f848708f49947c0bd042d8e45cea037daed7ecc321&o=&hp=1"
                 alt="Appartement à louer">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Appartement Cosy Centre-Ville</h3>
                <p class="text-sm text-gray-600 mb-2">Appartement charmant et lumineux, idéalement situé à proximité
                    des
                    commerces et des transports.</p>
                <p class="text-gray-700"><strong class="font-bold">150.-</strong> / nuit</p>
            </div>
        </a>

        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://cdn.jumeirah.com/-/mediadh/dh/hospitality/jumeirah/article/stories/dubai/uncover-the-story-of-burj-al-arab/herojcom_hero_imageburj-al-arab-jumeirah--jumeirah-beach-hotel---jumeirah-al-naseem--private-beach--drone.jpg?h=1080&w=1620&revision=b8aaa8a6-71d0-4e92-b124-c2f8fbe106c8"
                 alt="Appartement avec balcon">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Appartement avec Balcon Vue Ville</h3>
                <p class="text-sm text-gray-600 mb-2">Profitez d'un balcon spacieux avec une vue imprenable sur la
                    ville.</p>
                <p class="text-gray-700"><strong class="font-bold">180.-</strong> / nuit</p>
            </div>
        </a>

        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://media.architecturaldigest.com/photos/55e796eb302ba71f3018054d/4:3/w_492,h_369,c_limit/dam-images-homes-2002-05-ritz-hoar01_ritz.jpg"
                 alt="Loft industriel">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Loft Industriel avec Terrasse</h3>
                <p class="text-sm text-gray-600 mb-2">Spacieux loft au design industriel, parfait pour les séjours
                    en
                    groupe.</p>
                <p class="text-gray-700"><strong class="font-bold">220.-</strong> / nuit</p>
            </div>
        </a>

        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://media.architecturaldigest.com/photos/5783df143cba0f2e2ca06bae/master/pass/Shangri-La%202.jpg"
                 alt="Studio moderne">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Studio Moderne et Fonctionnel</h3>
                <p class="text-sm text-gray-600 mb-2">Studio récemment rénové, idéal pour un voyageur seul ou un
                    couple.</p>
                <p class="text-gray-700"><strong class="font-bold">90.-</strong> / nuit</p>
            </div>
        </a>

        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://upload.wikimedia.org/wikipedia/commons/d/d4/H%C3%B4tel_InterContinental_Paris_Le_Grand_2.jpg"
                 alt="Appartement familial">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Grand Appartement Familial</h3>
                <p class="text-sm text-gray-600 mb-2">Appartement spacieux avec plusieurs chambres, idéal pour les
                    familles avec enfants.</p>
                <p class="text-gray-700"><strong class="font-bold">280.-</strong> / nuit</p>
            </div>
        </a>

        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/183885832.jpg?k=c99bcaee6a215d0748d7502704745befdbffaecc87c1a90a855ce025568fe963&o=&hp=1"
                 alt="Appartement avec vue mer">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Appartement Vue Mer Exceptionnelle</h3>
                <p class="text-sm text-gray-600 mb-2">Appartement avec une vue imprenable sur la mer, idéal pour des
                    vacances relaxantes.</p>
                <p class="text-gray-700"><strong class="font-bold">250.-</strong> / nuit</p>
            </div>
        </a>
        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://www.swisslife.ch/content/internet/ch/fr/private/blog/immo/wohntraeume-mit-exklusivem-design/_jcr_content/moodimagearticle/image.1718258917857.transform/16_9_3840w/immopulse_tv_exlusive_residenzen.jpg"
                 alt="Appartement de luxe">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Appartement de Luxe avec Piscine</h3>
                <p class="text-sm text-gray-600 mb-2">Profitez d'un séjour haut de gamme dans cet appartement avec
                    piscine privée et vue panoramique.</p>
                <p class="text-gray-700"><strong class="font-bold">450.-</strong> / nuit</p>
            </div>
        </a>

        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://cdn.cilomarbella.com/wp-content/uploads/2023/02/ABU-14-Marbella-NVOGA-Developments-Block.jpeg"
                 alt="Appartement moderne en ville">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Appartement Moderne en Ville</h3>
                <p class="text-sm text-gray-600 mb-2">Appartement au design contemporain, idéal pour un séjour
                    urbain et
                    dynamique.</p>
                <p class="text-gray-700"><strong class="font-bold">190.-</strong> / nuit</p>
            </div>
        </a>

        <a href="#"
           class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
            <img class="w-full h-48 object-cover"
                 src="https://immo-ile-maurice.com/wp-content/uploads/2019/08/Penthouse-Mont-Choisy-la-Re%CC%81serve.png"
                 alt="Penthouse de luxe">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Penthouse de Luxe avec Vue Panoramique</h3>
                <p class="text-sm text-gray-600 mb-2">Superbe penthouse offrant une vue à 360 degrés sur la
                    ville.</p>
                <p class="text-gray-700"><strong class="font-bold">600.-</strong> / nuit</p>
            </div>
        </a>
    </div>
</div>
</body>
