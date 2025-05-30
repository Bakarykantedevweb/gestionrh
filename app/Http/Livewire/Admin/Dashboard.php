<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Agent;
use App\Models\Poste;
use App\Models\Agence;
use App\Models\Contrat;
use Livewire\Component;
use App\Models\Stagiaire;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $users,$contrats,$departements,$stagiaires,$agents;

    public $agences, $departementFiltres;

    public $SelectedAgence,$selectedDepartement,$selectedSexe;

    public function mount()
    {
        $this->agences = Agence::get();
        $this->departementFiltres = Departement::get();
    }

    public function render()
    {
        $this->users = User::count();
        $this->contrats = Contrat::count();
        $this->stagiaires = Stagiaire::count();
        $this->agents = Agent::count();

        // Récupérer les statistiques par sexe (homme/femme)
        $agentsBySexe = Agent::select('sexe', DB::raw('COUNT(*) as count'))
        ->groupBy('sexe')
            ->get();

        // Préparer les données pour le graphique Morris.js
        $graphData = [];

        // Ajouter les données par sexe (homme/femme)
        foreach ($agentsBySexe as $item) {
            if ($item->sexe == 'M') {
                $graphData[] = ['y' => 'Hommes', 'a' => $item->count, 'type' => 'Sexe'];
            } elseif ($item->sexe == 'F') {
                $graphData[] = ['y' => 'Femmes', 'a' => $item->count, 'type' => 'Sexe'];
            }
        }

        // Passer les données directement à la vue Livewire
        return view('livewire.admin.dashboard', ['graphData' => $graphData]);
    }
}

