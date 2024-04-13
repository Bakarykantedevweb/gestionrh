<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\TypeConge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conge extends Model
{
    use HasFactory;

    public function typeConge()
    {
        return $this->belongsTo(TypeConge::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}

