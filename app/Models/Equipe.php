<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;
    public function continents() {
        return $this->belongsTo(Continent::class, "continent_id");
    }
    public function joueurs() {
        return $this->hasOne(Joueur::class, "equipe_id");
    }
}