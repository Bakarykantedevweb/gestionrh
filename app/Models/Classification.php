<?php

namespace App\Models;

use App\Models\Diplome;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classification extends Model
{
    use HasFactory;

    public function diplomes()
    {
        return $this->belongsToMany(Diplome::class);
    }
}
