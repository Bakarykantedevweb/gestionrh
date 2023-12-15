<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Rubrique;
use App\Models\FeuilleCalcule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function feuilleCalcule()
    {
        return $this->belongsTo(FeuilleCalcule::class);
    }

    public function rubriques()
    {
        return $this->belongsToMany(Rubrique::class);
    }

    public function contratRubriques()
    {
        return $this->hasMany(ContratRubrique::class);
    }

}
