<?php

namespace App\Models;

use App\Models\Agence;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stagiaire extends Model
{
    use HasFactory;

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }
}
