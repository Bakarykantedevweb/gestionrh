<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Poste;
use App\Models\Agence;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affectation extends Model
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
}
