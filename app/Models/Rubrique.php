<?php

namespace App\Models;

use App\Models\NatureRubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rubrique extends Model
{
    use HasFactory;

    public function nature()
    {
        return $this->belongsTo(NatureRubrique::class);
    }
}
