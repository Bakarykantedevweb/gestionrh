<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Offre;
use App\Models\Diplome;
use App\Models\Salaire;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Experience;

class Index extends Component
{
    public $offres, $experiences, $salaires, $categories, $diplomes;

    public $selectedExperiences = [];
    public $selectedSalaires = [];
    public $selectedCategories = [];
    public $selectedDiplomes = [];

    public function mount()
    {
        $this->offres = Offre::where('date_limite', '>=', now())->orderBy('id', 'desc')->get();
        $this->experiences = Experience::orderBy('id', 'asc')->get();
        $this->salaires = Salaire::get();
        $this->categories = Categorie::get();
        $this->diplomes = Diplome::get();

        $this->filterOffres();
    }

    public function filterOffres()
    {
        $query = Offre::where('date_limite', '>=', now())->orderBy('id', 'desc');

        if (!empty($this->selectedExperiences)) {
            $query->whereIn('experience_id', $this->selectedExperiences);
        }

        if (!empty($this->selectedSalaires)) {
            $query->whereIn('salaire_id', $this->selectedSalaires);
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('categorie_id', $this->selectedCategories);
        }

        if (!empty($this->selectedDiplomes)) {
            $query->whereIn('diplome_id', $this->selectedDiplomes);
        }

        $this->offres = $query->get();
    }

    public function updatedSelectedExperiences()
    {
        $this->filterOffres();
    }

    public function updatedSelectedSalaires()
    {
        $this->filterOffres();
    }

    public function updatedSelectedCategories()
    {
        $this->filterOffres();
    }

    public function updatedSelectedDiplomes()
    {
        $this->filterOffres();
    }

    public function render()
    {
        return view('livewire.frontend.index');
    }
}
