<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formule extends Model
{
    use HasFactory;

    public function variables()
    {
        return $this->belongsToMany(Variable::class, 'formule_variable', 'formule_id', 'variable_id');
    }

    
}
