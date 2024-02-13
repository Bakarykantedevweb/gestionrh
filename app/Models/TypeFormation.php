<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeFormation extends Model
{
    use HasFactory;

    public $table = 'type_formations';

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }
}
