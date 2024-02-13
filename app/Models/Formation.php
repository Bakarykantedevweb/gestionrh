<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Formateur;
use App\Models\TypeFormation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

    public function type_formation()
    {
        return $this->belongsTo(TypeFormation::class);
    }

}
