<?php

namespace App\Models;

use App\Models\Convention;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConventionCategorie extends Model
{
    use HasFactory;

    public function convention()
    {
        return $this->belongsTo(Convention::class);
    }
}
