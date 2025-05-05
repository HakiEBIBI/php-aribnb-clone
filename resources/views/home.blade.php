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
<div class="container mx-auto px-4 py-8">
    <section class="mb-12">
        <h2 class="text-3xl font-semibold text-black mb-4">Nos 3 Hôtels les Plus Choisis</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="#"
               class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                <img class="w-full h-48 object-cover"
                     src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/467043153.jpg?k=f320d1c69189e4426595b9f848708f49947c0bd042d8e45cea037daed7ecc321&o=&hp=1"
                     alt="Hôtel le plus choisi">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Beau-Rivage Palace</h3>
                    <p class="text-sm text-gray-600">Hôtel de luxe 5 étoiles situé sur les rives du lac Léman, connu
                        pour son architecture Belle Époque, son spa exceptionnel et son restaurant étoilé.</p>
                    <p class="text-gray-700"><strong class="font-bold">600.-</strong> / nuit</p>
                </div>
            </a>

            <a href="#"
               class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                <img class="w-full h-48 object-cover"
                     src="https://cdn.jumeirah.com/-/mediadh/dh/hospitality/jumeirah/article/stories/dubai/uncover-the-story-of-burj-al-arab/herojcom_hero_imageburj-al-arab-jumeirah--jumeirah-beach-hotel---jumeirah-al-naseem--private-beach--drone.jpg?h=1080&w=1620&revision=b8aaa8a6-71d0-4e92-b124-c2f8fbe106c8"
                     alt="Hôtel le plus choisi">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Burj Al Arab</h3>
                    <p class="text-sm text-gray-600">Surnommé "l’hôtel 7 étoiles", le Burj Al Arab est un symbole du
                        luxe ultime avec son design en forme de voile et ses suites somptueuses surplombant la mer.</p>
                    <p class="text-gray-700"><strong class="font-bold">1'200.-</strong> / nuit</p>
                </div>
            </a>

            <a href="#"
               class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                <img class="w-full h-48 object-cover"
                     src="https://media.architecturaldigest.com/photos/55e796eb302ba71f3018054d/4:3/w_492,h_369,c_limit/dam-images-homes-2002-05-ritz-hoar01_ritz.jpg"
                     alt="Hôtel le plus choisi">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">The Ritz</h3>
                    <p class="text-sm text-gray-600"> Situé place Vendôme, le Ritz est un palace mythique qui allie
                        élégance, raffinement à la française et histoire littéraire (lieu fréquenté par Hemingway et
                        Coco Chanel).</p>
                    <p class="text-gray-700"><strong class="font-bold">1'300.-</strong> / nuit</p>
                </div>
            </a>
        </div>
    </section>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-black-800 mb-6">Nos Hôtels par Villes</h1>
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Paris</h2>
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Nos Suggestions à Paris</h3>
                <div class="space-y-4">
                    <a href="#"
                       class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                        <img class="w-full h-40 object-cover"
                             src="https://media.architecturaldigest.com/photos/5783df143cba0f2e2ca06bae/master/pass/Shangri-La%202.jpg"
                             alt="Hôtel à Paris">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Hôtel Eiffel View</h3>
                            <p class="text-sm text-gray-600">Charmant hôtel offrant une vue directe sur la Tour Eiffel,
                                idéal pour un séjour romantique au cœur de Paris.</p>
                            <p class="text-gray-700"><strong class="font-bold">180.-</strong> / nuit</p>
                        </div>
                    </a>

                    <a href="#"
                       class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                        <img class="w-full h-40 object-cover"
                             src="https://upload.wikimedia.org/wikipedia/commons/d/d4/H%C3%B4tel_InterContinental_Paris_Le_Grand_2.jpg"
                             alt="Hôtel à Paris">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Grand Hôtel Opéra</h3>
                            <p class="text-sm text-gray-600">Hôtel élégant situé dans le quartier animé de l’Opéra,
                                parfait pour les amateurs de culture et de shopping.</p>
                            <p class="text-gray-700"><strong class="font-bold">220.-</strong> / nuit</p>
                        </div>
                    </a>

                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Barcelone</h2>
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Nos Suggestions à Barcelone</h3>
                <div class="space-y-4">
                    <a href="#"
                       class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                        <img class="w-full h-40 object-cover"
                             src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/183885832.jpg?k=c99bcaee6a215d0748d7502704745befdbffaecc87c1a90a855ce025568fe963&o=&hp=1"
                             alt="Hôtel à Barcelone">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Hotel Playa Bonita</h3>
                            <p class="text-sm text-gray-600">Hôtel en bord de mer avec accès direct à la plage, idéal
                                pour les vacances ensoleillées.</p>
                            <p class="text-gray-700"><strong class="font-bold">150.-</strong> / nuit</p>
                        </div>
                    </a>

                    <a href="#"
                       class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                        <img class="w-full h-40 object-cover"
                             src="https://images.trvl-media.com/lodging/2000000/1380000/1379100/1379046/4a1f74cb.jpg?impolicy=resizecrop&rw=575&rh=575&ra=fill"
                             alt="Hôtel à Barcelone">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">City Center Hotel BCN</h3>
                            <p class="text-sm text-gray-600"> Hôtel moderne en plein centre-ville, entouré de boutiques,
                                bars et restaurants.</p>
                            <p class="text-gray-700"><strong class="font-bold">190.-</strong> / nuit</p>
                        </div>
                    </a>

                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Rome</h2>
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Nos Suggestions à Rome</h3>
                <div class="space-y-4">
                    <a href="#"
                       class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                        <img class="w-full h-40 object-cover"
                             src="https://www.manfredihotels.com/wp-content/uploads/2020/03/Aroma_Restaurant-Terrace_2-scaled.jpg"
                             alt="Hôtel à Rome">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Hotel Colosseum View</h3>
                            <p class="text-sm text-gray-600"> Hôtel avec vue imprenable sur le Colisée, parfait pour
                                découvrir la Rome antique.</p>
                            <p class="text-gray-700"><strong class="font-bold">170.-</strong> / nuit</p>
                        </div>
                    </a>
                    <a href="#"
                       class="block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 ease-in-out bg-white cursor-pointer">
                        <img class="w-full h-40 object-cover"
                             src="https://image-tc.galaxy.tf/wijpeg-agqb51ku8dsy608tboe3ap7ly/unahotels-trastevere-roma-facade-dayhero-4000x2667-bf46245c-4ebf-40f8-81b4-16c1e1d2549e-min.jpg"
                             alt="Hôtel à Rome">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Trastevere Boutique Hotel</h3>
                            <p class="text-sm text-gray-600">Petit hôtel de charme situé dans le quartier bohème de
                                Trastevere, connu pour ses ruelles pittoresques.</p>
                            <p class="text-gray-700"><strong class="font-bold">200.-</strong> / nuit</p>
                        </div>
                    </a>
                </div>
            </div>

        </section>
    </div>
</div>
</body>
</html>
