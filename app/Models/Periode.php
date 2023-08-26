<?php

namespace App\Models;

use App\Models\Bulletin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periode extends Model
{
    use HasFactory;

    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }
}
