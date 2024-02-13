<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;

    public function postes()
    {
        return $this->belongsToMany(Poste::class);
    }

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
