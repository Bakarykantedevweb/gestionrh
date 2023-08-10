<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Droit_Role extends Model
{
    use HasFactory;
    
    protected $table = 'droit_role';
    protected $guarded=[];
}
