<?php

namespace App\Models;

use App\Models\Classification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diplome extends Model
{
    use HasFactory;

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
}
