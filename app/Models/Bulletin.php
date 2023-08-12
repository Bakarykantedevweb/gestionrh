<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Periode;
use App\Models\Rubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bulletin extends Model
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }


    // Modèle Bulletin
    public function rubriques()
    {
        return $this->belongsToMany(Rubrique::class);
    }
}
