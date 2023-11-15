<?php

namespace App\Models;

use App\Models\Formule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NatureRubrique extends Model
{
    use HasFactory;

    public function formule()
    {
        return $this->belongsTo(Formule::class);
    }
}
