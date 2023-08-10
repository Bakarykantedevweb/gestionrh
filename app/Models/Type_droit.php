<?php

namespace App\Models;

use App\Models\Droit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type_droit extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table = "type_droits";

    /**
     * Acces au droit
     */
    public function droits()
    {
        return $this->hasMany(Droit::class);
    }
}
