<?php

namespace App\Http\Livewire\Admin\Contrat;

use App\Models\Agent;
use App\Models\Diplome;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Convention;
use App\Models\CentreImpot;
use App\Models\TypeContrat;
use App\Models\FeuilleCalcule;

class Create extends Component
{
    public $selectedOption;

    public $options = [
        'Marie' => 'text',
        'Divorce' => 'text',
        'Veuf' => 'text',
        'Célibataire' => 'hidden',
    ];
    public $agents, $typeContrats, $centreImpots, $feuilles, $diplomes;
    public $conventions;
    public $montantCategorie; // Variable pour stocker le montant de la catégorie sélectionnée

    public $selectedConvention, $selectedCategory;
    public $categories;

    

    public function mount()
    {
        $this->categories = [];
        //$this->montantCategorie = null;
    }

    public function updatedSelectedConvention($value)
    {
        // dd($value);
        $convention = Convention::find($value);
        $this->categories = $convention ? $convention->categories : [];
        $this->montantCategorie = null; // Réinitialise le montant lorsque la convention change.
    }

    public function updatedSelectedCategory($categoryId)
    {
        $category = Categorie::find($categoryId);
        $this->montantCategorie = $category ? $category->montant : null;
    }

    public function render()
    {
        // Chargement des données depuis la base de données pour les différentes sélections
        $this->agents = Agent::get();
        $this->typeContrats = TypeContrat::get();
        $this->centreImpots = CentreImpot::get();
        $this->feuilles = FeuilleCalcule::get();
        $this->conventions = Convention::get();
        $this->diplomes = Diplome::get();
        return view('livewire.admin.contrat.create');
    }
}
