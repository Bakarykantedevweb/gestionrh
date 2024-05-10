<?php

namespace App\Models;

use App\Models\Bulletin;
use App\Models\Exercice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periode extends Model
{
    use HasFactory;

    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }
}
