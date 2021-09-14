@extends("layouts.index")
@section('content')
    <h1 class="text-center my-10 text-4xl underline text-white">Display Joueurs/Equipes</h1>
    <div class="bg-indigo-700 h-1"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Equipes complètes</h1>
    @foreach ($equipes as $equipe)
        @if ($joueurs->where('equipe_id', $equipe->id)->count() == $equipe->max)
            <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                <div class="flex items-center">
                    <span
                        class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->pays }}</span>
                    <span
                        class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->continents->continent }}</span>
                </div>
                <div>
                    <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $equipe->club }}</h1>
                </div>
            </div>
        @endif
    @endforeach
    <div class="bg-indigo-700 h-1 mt-10"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Equipes non remplies</h1>
    @foreach ($equipes as $equipe)
        @if ($joueurs->where('equipe_id', $equipe->id)->count() != $equipe->max)
            <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                <div class="flex items-center">
                    <span
                        class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->pays }}</span>
                    <span
                        class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->continents->continent }}</span>
                </div>
                <div>
                    <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $equipe->club }}</h1>
                </div>
            </div>
        @endif
    @endforeach
    <div class="bg-indigo-700 h-1 mt-10"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Joueurs sans equipes</h1>
    @foreach ($joueurs as $joueur)
        @if ($joueur->equipe_id == null))
            <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                <div class="flex items-center">
                    <span
                        class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Nom
                        : {{ $joueur->nom }}</span>
                    <span
                        class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Prenom
                        :{{ $joueur->prenom }}</span>
                </div>
                <div>
                    <img src="{{ asset('storage/img/' . $joueur->photos->url) }}" width="100px" height="50px"
                        class="rounded-full mt-2 mx-auto" alt="">
                    <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $joueur->age }} ans</h1>
                </div>
            </div>
        @endif
    @endforeach
    <div class="bg-indigo-700 h-1 mt-10"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Joueurs avec equipe</h1>
    @foreach ($joueurs as $joueur)
        @foreach ($equipes as $equipe)
            @if ($joueur->equipe_id == $equipe->id))
                <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                    <div class="flex items-center">
                        <span
                            class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Nom
                            : {{ $joueur->nom }}</span>
                        <span
                            class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Prenom
                            :{{ $joueur->prenom }}</span>
                    </div>
                    <div>
                        <img src="{{ asset('storage/img/' . $joueur->photos->url) }}" width="100px" height="50px"
                            class="rounded-full mt-2 mx-auto" alt="">
                        <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $joueur->age }} ans</h1>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
    <div class="bg-indigo-700 h-1 mt-10"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Equipe d'Europe</h1>
    @foreach ($equipes as $equipe)
        @if ($equipe->continent_id == 1)
            <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                <div class="flex items-center">
                    <span
                        class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->pays }}</span>
                    <span
                        class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->continents->continent }}</span>
                </div>
                <div>
                    <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $equipe->club }}</h1>
                </div>
            </div>
        @endif
    @endforeach
    <div class="bg-indigo-700 h-1 mt-10"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Equipe hors UE</h1>
    @foreach ($equipes as $equipe)
        @if ($equipe->continent_id != 1)
            <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                <div class="flex items-center">
                    <span
                        class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->pays }}</span>
                    <span
                        class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->continents->continent }}</span>
                </div>
                <div>
                    <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $equipe->club }}</h1>
                </div>
            </div>
        @endif
    @endforeach
    <div class="bg-indigo-700 h-1 mt-10"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Femmes avec equipe</h1>
    @foreach ($joueurs as $joueur)
        @foreach ($equipes as $equipe)
            @if ($joueur->genre == "Femme" OR $joueur->genre == "Feminin" AND $joueur->equipe_id == $equipe->id))
                <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                    <div class="flex items-center">
                        <span
                            class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Nom
                            : {{ $joueur->nom }}</span>
                        <span
                            class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Prenom
                            :{{ $joueur->prenom }}</span>
                    </div>
                    <div>
                        <img src="{{ asset('storage/img/' . $joueur->photos->url) }}" width="100px" height="50px"
                            class="rounded-full mt-2 mx-auto" alt="">
                        <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $joueur->age }} ans</h1>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
    <div class="bg-indigo-700 h-1 mt-10"></div>
    <h1 class="text-center my-10 text-4xl underline text-white">Hommes avec equipe</h1>
    @foreach ($joueurs as $joueur)
        @foreach ($equipes as $equipe)
            @if ($joueur->genre == "Homme" OR $joueur->genre == "Masculin" AND $joueur->equipe_id == $equipe->id))
                <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
                    <div class="flex items-center">
                        <span
                            class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Nom
                            : {{ $joueur->nom }}</span>
                        <span
                            class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Prenom
                            :{{ $joueur->prenom }}</span>
                    </div>
                    <div>
                        <img src="{{ asset('storage/img/' . $joueur->photos->url) }}" width="100px" height="50px"
                            class="rounded-full mt-2 mx-auto" alt="">
                        <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $joueur->age }} ans</h1>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
@endsection
