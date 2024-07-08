<?php

namespace App\Models;

use App\Models\Bulletin;
use App\Models\FeuilleCalcule;
use App\Models\Contrat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rubrique extends Model
{
    use HasFactory;

    // Modèle Rubrique
    public function bulletins()
    {
        return $this->belongsToMany(Bulletin::class);
    }

    public function feuilles()
    {
        return $this->belongsToMany(FeuilleCalcule::class);
    }

    public function contrats()
    {
        return $this->belongsToMany(Contrat::class);
    }

}
