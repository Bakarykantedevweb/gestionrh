<?php

namespace App\Models;

use App\Models\Rubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeuilleCalcule extends Model
{
    use HasFactory;

    public function rubriques()
    {
        return $this->belongsToMany(Rubrique::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
}
