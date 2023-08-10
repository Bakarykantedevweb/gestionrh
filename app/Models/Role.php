<?php

namespace App\Models;

use App\Models\User;
use App\Models\Droit;
use App\Models\Administrateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guarded=[];

    /**
     * Acces aux droits
     */
    public function droits()
    {
        return $this->belongsToMany(Droit::class);
    }

    /**
     * Access à l'utilisateur
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
