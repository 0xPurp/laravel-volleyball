@extends("layouts.index")
@include("layouts.flashJoueur")
@section('content')
    @foreach ($equipes as $equipe)
        <div class="w-full max-w-sm px-4 py-3 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-5">
            <div class="flex items-center">
                <span
                    class="px-3 py-1 text-xs text-indigo-800 uppercase bg-indigo-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->pays }}</span>
                    <span class="ml-2 px-3 py-1 text-xs text-pink-800 uppercase bg-pink-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">{{ $equipe->continents->continent }}</span>
            </div>
            <div>
                <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $equipe->club }}</h1>
            </div>
            <div class="flex items-center justify-between">
                <a href={{"equipe/".$equipe->id}}
                    class="px-3 py-1 text-xs text-green-800 uppercase bg-green-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900 ml-auto">Show</a>
                <form action="{{route('equipe.destroy', $equipe->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ml-2 px-3 py-1 text-xs text-red-800 uppercase bg-red-200 rounded-full dark:bg-indigo-300 dark:text-indigo-900">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection