<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contrat;

class UpdateJoursConge extends Command
{
    protected $signature = 'contrats:update-jours-conge';
    protected $description = 'Incrémente nombre_jour_conge à la fin de chaque mois';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $contracts = Contrat::all();

        foreach ($contracts as $contract) {
            // Incrémentez le champ nombre_jour_conge pour chaque contrat
            $contract->nombre_jour_conge += 2.5;
            $contract->save();
        }

        $this->info('La mise à jour des jours de congé a été effectuée avec succès.');
    }
}
