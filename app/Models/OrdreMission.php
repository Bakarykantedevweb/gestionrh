<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdreMission extends Model
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function superieur()
    {
        return $this->belongsTo(Agent::class, 'superieur_id');
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }
}
