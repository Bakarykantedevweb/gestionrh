<?php

namespace App\Models;

use App\Models\Diplome;
use App\Models\Salaire;
use App\Models\Categorie;
use App\Models\Experience;
use App\Models\TypeContrat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory;


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function salaire()
    {
        return $this->belongsTo(Salaire::class);
    }

    public function diplome()
    {
        return $this->belongsTo(Diplome::class);
    }


}
