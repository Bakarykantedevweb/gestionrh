<?php

namespace App\Models;

use App\Models\Categorie;
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


}
