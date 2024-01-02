<?php

namespace App\Http\Livewire\Frontend\Offre;

use App\Models\Categorie;
use App\Models\Offre;
use Livewire\Component;

class Index extends Component
{
    public $offres,$categories;
    public function render()
    {
        $this->categories = Categorie::get();
        $this->offres = Offre::orderBy('id', 'desc')->where('date_limite', '>=', now())->get();
        return view('livewire.frontend.offre.index');
    }
}
