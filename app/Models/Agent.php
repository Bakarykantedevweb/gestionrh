<?php

namespace App\Models;

use App\Models\Poste;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
}
