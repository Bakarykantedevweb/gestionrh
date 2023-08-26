<?php

namespace App\Models;

use App\Models\Bulletin;
use App\Models\FeuilleCalcule;
use App\Models\NatureRubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rubrique extends Model
{
    use HasFactory;

    public function nature()
    {
        return $this->belongsTo(NatureRubrique::class);
    }

    // Modèle Rubrique
    public function bulletins()
    {
        return $this->belongsToMany(Bulletin::class);
    }

    public function feuilles()
    {
        return $this->belongsToMany(FeuilleCalcule::class);
    }
}
