@extends("layouts.index")
@section('content')
    <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
        <div class="flex items-center justify-center">
            <span
                class="px-3 py-1 text-xs text-purple-800 uppercase bg-purple-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->ville }}</span>
            <span
                class="ml-2 px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->pays }}</span>
            <span
                class="ml-2 px-3 py-1 text-xs text-red-800 uppercase bg-red-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900"">{{ $equipe->continents->continent }}</span>
            </div>
            <div>
                <h1 class=" text-center mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $equipe->club }}</h1>
                <p>Joueurs : {{$joueur->where("equipe_id", $equipe->id)->count()}} / {{ $equipe->max }}</p>
                <p>Avants : {{$joueur->where("role_id", 1)->where("equipe_id", $equipe->id)->count()}} / 2</p>
                <p>Centraux : {{$joueur->where("role_id", 2)->where("equipe_id", $equipe->id)->count()}} / 2</p>
                <p>Arrières : {{$joueur->where("role_id", 3)->where("equipe_id", $equipe->id)->count()}} / 2</p>
                <p>Remplaçants : {{$joueur->where("role_id", 4)->where("equipe_id", $equipe->id)->count()}} / {{$equipe->max - 6}}</p>
            </div>
            <div class="flex">
                <a href={{ route('equipe.edit', $equipe->id) }}
                    class="px-3 py-1 text-xs text-yellow-800 uppercase bg-yellow-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900 ml-auto">Edit</a>
            </div>
        </div>
    </div>
@endsection
