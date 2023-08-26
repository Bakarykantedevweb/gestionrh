<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Convention extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }

}
