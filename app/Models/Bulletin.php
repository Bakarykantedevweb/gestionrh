<?php

namespace App\Models;

use App\Models\Contrat;
use App\Models\Periode;
use App\Models\Rubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bulletin extends Model
{
    use HasFactory;

    protected $table = 'bulletins';

    protected $guarded = [];

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }


    // Modèle Bulletin
    public function rubriques()
    {
        return $this->belongsToMany(Rubrique::class);
    }
}
