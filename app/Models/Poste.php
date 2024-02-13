<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poste extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function departements()
    {
        return $this->belongsToMany(Departement::class);
    }

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
