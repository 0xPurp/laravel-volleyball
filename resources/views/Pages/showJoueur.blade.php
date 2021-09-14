@extends("layouts.index")
@section('content')
    <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
        <div class="flex items-center">
            <span
                class="px-3 py-1 text-xs text-purple-800 uppercase bg-purple-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $joueur->roles->role }}</span>
            @if ($joueur->equipe_id == null)
                <span
                    class="ml-3 px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">No
                    Team</span>
            @else
                <span
                    class="ml-3 px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $joueur->equipes->club }}</span>
            @endif
        </div>
        <div class="mt-4">
            <img src="{{ asset('storage/img/' . $joueur->photos->url) }}" alt="" width="100px" height="100px">
            <h1 class="  mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $joueur->nom }} {{ $joueur->prenom }}
            </h1>
            <p>{{ $joueur->age }} ans</p>
            <p>N° tél : {{ $joueur->telephone }}</p>
            <p>Email : {{ $joueur->email }}</p>
            <p>Genre : {{ $joueur->genre }}</p>
        </div>
        <div class="flex">
            <a href={{ route('joueur.edit', $joueur->id) }}
                class="px-3 py-1 text-xs text-yellow-800 uppercase bg-yellow-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900 ml-auto">Edit</a>
        </div>
    </div>
    </div>
@endsection
