<?php

namespace App\Models;

use App\Models\Performance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function performances()
    {
        return $this->belongsToMany(Performance::class);
    }
}
