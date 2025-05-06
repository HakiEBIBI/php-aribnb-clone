<header class="text-lg">
    <div class="flex place-items-center content-center  justify-between mt-2 mb-6">
        <div class="ml-8 flex gap-10">
            <a href="home"
               class="px-4 py-2 rounded-full text-red-400 hover:bg-gray-100 hover:font-medium transition duration-200 ease-in-out">
                Accueil</a>
            <a href="all-apartment"
               class="px-4 py-2 rounded-full text-red-400 hover:bg-gray-100 hover:font-medium transition duration-200 ease-in-out">
                tout les appartements</a>
            <a href="#"
               class="px-4 py-2 rounded-full text-red-400 hover:bg-gray-100 hover:font-medium transition duration-200 ease-in-out">
                nouvel appartement</a>

        </div>

        <div class="mr-8 flex gap-10 items-center">
            @guest
                <a href="sign-in"
                   class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                    se connecter
                </a>

                <a href="sign-up"
                   class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                    s'inscrire
                </a>
            @endguest

            @auth
                <p class="text-red-500 font-bold">Votre nom est : {{ Auth::user()->name }}</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                        Se déconnecter
                    </button>
                </form>
            @endauth
        </div>

    </div>

</header>
