<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Type_droit;
use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
    //
    protected $guarded =[];
    protected $table = "droits";

    /**
     * administrateur Droit
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Acces au type_droit
     */
    public function type_droit()
    {
        return $this->belongsTo(Type_droit::class);
    }

}
