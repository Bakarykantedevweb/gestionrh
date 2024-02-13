<?php

namespace App\Http\Livewire\Frontend\Offre;


use App\Models\Categorie;
use App\Models\Offre;
use Livewire\Component;

class Index extends Component
{
    public $offres, $categories;
    public $categorie = [];

    public function render()
    {
        $this->categories = Categorie::get();

        $this->offres = Offre::when($this->categorie, function ($query) {
            $query->whereIn('categorie_id', is_array($this->categorie) ? $this->categorie : [$this->categorie]);
        })
        ->where('date_limite', '>=', now())
        ->orderBy('id','desc')
        ->get();

        return view('livewire.frontend.offre.index');
    }

}
