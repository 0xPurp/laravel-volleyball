<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $equipes = Equipe::all();
        $photos = Photo::all();
        return view("welcome", compact("roles", "equipes", "photos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nom' => 'required | min:3 | max:15',
            'prenom' => ['required', 'min:3', 'max:15'],
            'age' => ['required', 'min:', 'max:3'],
            'telephone' => ['required', 'min:8', 'max:15'],
            'email' => ['required', 'min:3', 'max:50'],
            'genre' => ['required', 'min:3', 'max:15'],
            'equipe_id' => ['required', 'min:1', 'max:100'],
            'role_id' => ['required', 'min:1', 'max:100'],
        ]);

        $equipe = Equipe::find($request->equipe_id);

        if ($request->equipe_id == null) {
            $photo = new Photo;
            $photo->url = $request->file("url")->hashName();
            Storage::put("public/img", $request->file("url"));
            $photo->save();

            $store = new Joueur;
            $store->nom = $request->nom;
            $store->prenom = $request->prenom;
            $store->age = $request->age;
            $store->telephone = $request->telephone;
            $store->email = $request->email;
            $store->genre = $request->genre;
            $store->role_id = $request->role_id;
            $store->equipe_id = $request->equipe_id;
            $store->photo_id = $photo->id;
            $store->save();
            return redirect("/displayJoueur")->with('success', 'Nouveau joueur ajouté');
        } else {

            /* --------- On ne vérifie les postes que si le joueur a une équipe --------- */

            $avant = Joueur::all()->where("role_id", 1)->where("equipe_id", $equipe->id);
            $central = Joueur::all()->where("role_id", 2)->where("equipe_id", $equipe->id);
            $arriere = Joueur::all()->where("role_id", 3)->where("equipe_id", $equipe->id);


            switch ($request->role_id) {
                case 1:
                    if ($avant->count() === 2) {
                        return redirect()->back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                    }
                    break;
                case 2:
                    if ($central->count() === 2) {
                        return redirect()->back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                    }
                    break;
                case 3:
                    if ($arriere->count() === 2) {
                        return redirect()->back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                    }
                    break;
            }
            $photo = new Photo;
            $photo->url = $request->file("url")->hashName();
            Storage::put("public/img", $request->file("url"));
            $photo->save();

            $store = new Joueur;
            $store->nom = $request->nom;
            $store->prenom = $request->prenom;
            $store->age = $request->age;
            $store->telephone = $request->telephone;
            $store->email = $request->email;
            $store->genre = $request->genre;
            $store->role_id = $request->role_id;
            $store->equipe_id = $request->equipe_id;
            $store->photo_id = $photo->id;
            $store->save();
            return redirect("/displayJoueur")->with('success', 'Nouveau joueur ajouté');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        return view("Pages.showJoueur", compact("joueur"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        $roles = Role::all();
        $equipes = Equipe::all();
        return view("Pages.editJoueur", compact("joueur", "roles", "equipes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        request()->validate([
            'nom' => 'required | min:3 | max:15',
            'prenom' => ['required', 'min:3', 'max:15'],
            'age' => ['required', 'min:', 'max:3'],
            'telephone' => ['required', 'min:8', 'max:15'],
            'email' => ['required', 'min:3', 'max:50'],
            'genre' => ['required', 'min:3', 'max:15'],
            'equipe_id' => ['required', 'min:1', 'max:100'],
            'role_id' => ['required', 'min:1', 'max:100'],
        ]);
        $equipe = Equipe::find($request->equipe_id);
        $joueur = Joueur::find($joueur->id);
        $photo = Photo::find($joueur->photos->id);

        if ($equipe->id != null) {
            if (($equipe->id != $joueur->equipe_id) || ($request->role_id != $joueur->role_id)) {
                $avant = Joueur::all()->where("role_id", 1)->where("equipe_id", $equipe->id);
                $central = Joueur::all()->where("role_id", 2)->where("equipe_id", $equipe->id);
                $arriere = Joueur::all()->where("role_id", 3)->where("equipe_id", $equipe->id);

                switch ($request->role_id) {
                    case 1:
                        if ($avant->count() === 2) {
                            return back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                        }
                        break;
                    case 2:
                        if ($central->count() === 2) {
                            return back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                        }
                        break;
                    case 3:
                        if ($arriere->count() === 2) {
                            return back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                        }
                        break;
                }
                $photo->url = $request->file("url")->hashName();
                Storage::put("public/img", $request->file("url"));
                $photo->save();
        
                $joueur->nom = $request->nom;
                $joueur->prenom = $request->prenom;
                $joueur->age = $request->age;
                $joueur->telephone = $request->telephone;
                $joueur->email = $request->email;
                $joueur->genre = $request->genre;
                $joueur->role_id = $request->role_id;
                if ($request->equipe_id == null) {
                } else {
                    $joueur->equipe_id = $request->equipe_id;
                }
                $joueur->photo_id = $photo->id;
                $joueur->save();
                return redirect("/displayJoueur")->with("success", "Joueur a été modifié");
            }

            $photo->url = $request->file("url")->hashName();
            Storage::put("public/img", $request->file("url"));
            $photo->save();
    
            $joueur->nom = $request->nom;
            $joueur->prenom = $request->prenom;
            $joueur->age = $request->age;
            $joueur->telephone = $request->telephone;
            $joueur->email = $request->email;
            $joueur->genre = $request->genre;
            $joueur->role_id = $request->role_id;
            if ($request->equipe_id == null) {
            } else {
                $joueur->equipe_id = $request->equipe_id;
            }
            $joueur->photo_id = $photo->id;
            $joueur->save();
            return redirect("/displayJoueur")->with("success", "Joueur a été modifié");
        } else {
            if (($equipe->id == $joueur->equipe_id) || ($request->role_id != $joueur->role_id)) {
                $avant = Joueur::all()->where("role_id", 1)->where("equipe_id", $equipe->id);
                $central = Joueur::all()->where("role_id", 2)->where("equipe_id", $equipe->id);
                $arriere = Joueur::all()->where("role_id", 3)->where("equipe_id", $equipe->id);

                switch ($request->role_id) {
                    case 1:
                        if ($avant->count() === 2) {
                            return back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                        }
                        break;
                    case 2:
                        if ($central->count() === 2) {
                            return back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                        }
                        break;
                    case 3:
                        if ($arriere->count() === 2) {
                            return back()->with("statut", "L'équipe {$equipe->club} dispose déjà de 2 joueurs à ce poste");
                        }
                        break;
                }
                $photo->url = $request->file("url")->hashName();
                Storage::put("public/img", $request->file("url"));
                $photo->save();
        
                $joueur->nom = $request->nom;
                $joueur->prenom = $request->prenom;
                $joueur->age = $request->age;
                $joueur->telephone = $request->telephone;
                $joueur->email = $request->email;
                $joueur->genre = $request->genre;
                $joueur->role_id = $request->role_id;
                if ($request->equipe_id == null) {
                } else {
                    $joueur->equipe_id = $request->equipe_id;
                }
                $joueur->photo_id = $photo->id;
                $joueur->save();
                return redirect("/displayJoueur")->with("success", "Joueur a été modifié");
            }

            $photo->url = $request->file("url")->hashName();
            Storage::put("public/img", $request->file("url"));
            $photo->save();
    
            $joueur->nom = $request->nom;
            $joueur->prenom = $request->prenom;
            $joueur->age = $request->age;
            $joueur->telephone = $request->telephone;
            $joueur->email = $request->email;
            $joueur->genre = $request->genre;
            $joueur->role_id = $request->role_id;
            $joueur->equipe_id = $request->equipe_id;
            $joueur->photo_id = $photo->id;
            $joueur->save();
            return redirect("/displayJoueur")->with('success', 'Nouveau joueur ajouté');
        }

        // $photo = new Photo;
        // $photo->url = $request->file("url")->hashName();
        // Storage::put("public/img", $request->file("url"));
        // $photo->save();

        // $joueur = new Joueur;
        // $joueur->nom = $request->nom;
        // $joueur->prenom = $request->prenom;
        // $joueur->age = $request->age;
        // $joueur->telephone = $request->telephone;
        // $joueur->email = $request->email;
        // $joueur->genre = $request->genre;
        // $joueur->role_id = $request->role_id;
        // $joueur->equipe_id = $request->equipe_id;
        // $joueur->photo_id = $photo->id;
        // $joueur->save();
        // return redirect("/displayJoueur")->with('success', 'Nouveau joueur ajouté');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        $photo = Photo::find($joueur->id);
        Storage::delete('public/img/' . $photo->url);
        $photo->delete();
        return redirect("/displayJoueur")->with('success', 'Joueur Effacé');
    }
}
