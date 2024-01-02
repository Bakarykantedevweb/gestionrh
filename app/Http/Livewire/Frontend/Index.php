<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Categorie;
use App\Models\Offre;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public function render()
    {
        $this->categories = Categorie::where('status','1')->get();

        foreach ($this->categories as $key => $value) {
            $this->categories[$key]->count_produit = Offre::where('categorie_id', $value->id)
                ->count();
        }
        return view('livewire.frontend.index');
    }
}
