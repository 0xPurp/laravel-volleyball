<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $equipes = Equipe::all();
    $joueurs = Joueur::all();
    return view('welcome', compact('equipes', 'joueurs'));
});
Route::get("/createEquipe", function(){
    $continents = Continent::all();
    return view('Pages.createEquipe', compact("continents"));
})->name("createEquipe");

Route::get("/displayEquipe", function() {
    $equipes = Equipe::all();
    return view("Pages.displayEquipe", compact("equipes"));
})->name("displayEquipe");

Route::get("/createJoueur", function() {
    $roles = Role::all();
    $equipes = Equipe::all();
    $photos = Photo::all();
    return view('Pages.createJoueur', compact("roles", "equipes", "photos"));
})->name("createJoueur");

Route::get("/displayJoueur", function() {
    $joueurs = Joueur::all();
    $photos = Photo::all();
    $roles = Role::all();
    $equipes = Equipe::all();
    return view("Pages.displayJoueur", compact("joueurs", "photos", "roles", "equipes"));
})->name("displayJoueur");

// Route::get("/equipe/{id}/show", [EquipeController::class, "show"]);

Route::resource('equipe', EquipeController::class);
Route::resource('joueur', JoueurController::class);