<nav class="bg-indigo-700 shadow dark:bg-gray-800">
    <div class="container flex items-center justify-center p-6 mx-auto text-white capitalize dark:text-gray-300">
        <a href="/"
            class=" dark:text-gray-200 hover:border-pink-500    mx-1.5 sm:mx-6 border-b-2 border-transparent">Home</a>
        <a href="{{ route('createEquipe') }}"
            class="border-b-2 border-transparent  dark:hover:text-gray-200 hover:border-pink-500 mx-1.5 sm:mx-6">Create
            Team</a>
        <a href="{{ route('createJoueur') }}"
            class="border-b-2 border-transparent  dark:hover:text-gray-200 hover:border-pink-500 mx-1.5 sm:mx-6">Create
            Joueur</a>
        <a href="{{ route('displayEquipe') }}"
            class="border-b-2 border-transparent  dark:hover:text-gray-200 hover:border-pink-500 mx-1.5 sm:mx-6">Display
            All Teams</a>
        <a href="{{ route('displayJoueur') }}"
            class="border-b-2 border-transparent  dark:hover:text-gray-200 hover:border-pink-500 mx-1.5 sm:mx-6">Display
            All Joueur</a>
    </div>
</nav>