@extends("layouts.index")
@include('layouts.flashJoueur')
@section("content")
    @foreach ($joueurs as $joueur)
    <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-10">
        <div class="flex items-center justify-between">
            <span class="text-sm font-light text-gray-800 dark:text-gray-400">{{$joueur->prenom}} {{$joueur->nom}}</span>
            @if ($joueur->equipe_id == NULL)
            <span class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">No Team</span>
            @else
            <span class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{$joueur->equipes->club}}</span>
            @endif
        </div>
        <div>
            <img src="{{asset("storage/img/".$joueur->photos->url)}}" alt="" width="100px" height="100px">
            <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white"><span class="font-light">Poste :</span> {{$joueur->roles->role}}</h1>
        </div>
        <div class="flex items-center justify-between">
            <a href={{"joueur/".$joueur->id}}
                class="px-3 py-1 text-xs text-green-800 uppercase bg-green-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900 ml-auto">Show</a>
            <form action="{{route("joueur.destroy", $joueur->id)}}" method='POST'>
                @csrf
                @method("DELETE")
                <button type="submit" class="ml-2 px-3 py-1 text-xs text-red-800 uppercase bg-red-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
@endsection