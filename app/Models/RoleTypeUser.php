<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleTypeUser extends Model
{
    use HasFactory;

    /**
     * Acces aux utilisateurs
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
