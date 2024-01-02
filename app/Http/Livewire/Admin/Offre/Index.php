<?php

namespace App\Http\Livewire\Admin\Offre;

use App\Models\Offre;
use Livewire\Component;

class Index extends Component
{
    public $offres;
    public function render()
    {
        $this->offres = Offre::get();
        return view('livewire.admin.offre.index');
    }
}
