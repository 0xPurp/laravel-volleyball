@extends("layouts.index")
@include("layouts.flashJoueur")
@section('content')
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-20">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Joueur Update</h2>
        <form action="{{ route('joueur.update', $joueur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="nom">Nom du Joueur</label>
                    <input id="nom" type="text" name="nom" value="{{ $joueur->nom }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="prenom">Prénom du joueur</label>
                    <input id="prenom" type="text" name="prenom" value="{{ $joueur->prenom }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="age">Âge</label>
                    <input id="age" type="number" name="age" value="{{ $joueur->age }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="tel">N° de Telephone</label>
                    <input name="telephone" id="tel" value="{{ $joueur->telephone }}" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="mail">E-mail</label>
                    <input name="email" id="mail" value="{{ $joueur->email }}" type="email"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="genre">Genre</label>
                    <input name="genre" id="genre" value="{{ $joueur->genre }}" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="role">Rôle</label>
                    <select name="role_id" id="role" value="{{ $joueur->roles->role }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $joueur->role_id ? 'selected' : null }}>
                                {{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="equipe">Equipe</label>
                    <select name="equipe_id" id="equipe" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @if ($joueur->equipe_id == null)
                        <option value="null" selected>NoTeam</option>
                        @endif
                        @foreach ($equipes as $equipe)
                            <option value="{{$equipe->id}}"{{ $equipe->id == $joueur->equipe_id ? 'selected' : null }}>{{$equipe->club}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="photo">Photo</label>
                    <input name="url" id="photo" type="file"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600"
                    type="submit">Update</button>
            </div>
        </form>
    </section>
@endsection
