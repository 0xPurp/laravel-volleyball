<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Role;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continents = Continent::all();
        return view("Pages.createEquipe", compact("continents"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'club' => 'required | min:3 | max:50',
            'ville' => ['required', 'min:3', 'max:50'],
            'pays' => ['required', 'min:1', 'max:50'],
            'max' => ['required', 'min:1', 'max:50'],
            'continent_id' => ['required', 'min:1', 'max:15'],
        ]);


        $store = new Equipe;
        $store->club = $request->club;
        $store->ville = $request->ville;
        $store->pays = $request->pays;
        $store->max = $request->max;
        $store->continent_id = $request->continent_id;
        $store->save();
        return redirect("/displayEquipe")->with("success", "Nouvelle equipe créee");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        $joueur = Joueur::all();
        return view("Pages.showEquipe", compact("equipe", "joueur"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        $continents = Continent::all();
        return view("Pages.editEquipe", compact("continents", "equipe"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $equipe->club = $request->club;
        $equipe->ville = $request->ville;
        $equipe->pays = $request->pays;
        $equipe->max = $request->max;
        $equipe->continent_id = $request->continent_id;
        $equipe->save();
        return redirect("/displayEquipe")->with("warning", "Equipe modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $joueurs = Joueur::all()->where("equipe_id", $equipe->id);
        foreach ($joueurs as $joueur) {
            $joueur->equipe_id = null;
            $joueur->save();
        }
        $equipe->delete();
        return redirect("/displayEquipe")->with("warning", "Equipe supprimée");
    }
}
