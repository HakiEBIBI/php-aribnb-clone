<header class="text-lg">
    <div class="flex place-items-center content-center  justify-between mt-2 mb-6">
        <div class="ml-8 flex gap-10">
            <a href="{{route('home')}}"
               class="px-4 py-2 rounded-full text-red-400 hover:bg-gray-100 hover:font-medium transition duration-200 ease-in-out">
                Accueil</a>
            <a href="{{route('apartments.index')}}"
               class="px-4 py-2 rounded-full text-red-400 hover:bg-gray-100 hover:font-medium transition duration-200 ease-in-out">
                tout les appartements</a>
            <a href="{{route('apartments.create')}}"
               class="px-4 py-2 rounded-full text-red-400 hover:bg-gray-100 hover:font-medium transition duration-200 ease-in-out">
                nouvel appartement</a>

        </div>

        <div class="mr-8 flex gap-10 items-center">
            @guest
                <a href="/sign-in"
                   class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                    se connecter
                </a>

                <a href="/sign-up"
                   class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                    s'inscrire
                </a>
            @endguest

            @auth
                <p class="text-red-500 font-bold">Votre nom est : {{ Auth::user()->name }}</p>
                <a href="{{ route('accountDetail') }}"
                   class="inline-flex items-center px-4 py-2 bg-red-400 text-white rounded-lg hover:bg-red-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Account Detail
                </a>
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
