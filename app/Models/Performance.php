<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Performance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function superieur()
    {
        return $this->belongsTo(Agent::class, 'superieur_id');
    }
}
