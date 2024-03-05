<?php

namespace App\Models;

use App\Models\Rubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContratRubrique extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'contrat_rubrique';

    public function rubrique()
    {
        return $this->belongsTo(Rubrique::class);
    }
}
