<?php

namespace App\Models;

use App\Models\Poste;
use App\Models\Agence;
use App\Models\Enfant;
use App\Models\Contrat;
use App\Models\Formation;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use HasFactory;

    protected $table = 'agents';

    protected $guarded = [];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function contrat()
    {
        return $this->hasOne(Contrat::class, 'agent_id');
    }


    public function enfants()
    {
        return $this->hasMany(Enfant::class);
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }

    public function incrementLoginAttempts()
    {
        $this->login_attempts++;
        $this->last_login_attempt = now();
        $this->save();
    }

    public function resetLoginAttempts()
    {
        $this->login_attempts = 0;
        $this->save();
    }

    public function blockAccount()
    {
        $this->update([
            'blocked' => true,
        ]);
    }

    public function unblockAccount()
    {
        $this->update([
            'blocked' => false, // Met à jour le champ "blocked" pour indiquer que le compte n'est plus bloqué
        ]);
    }
}
