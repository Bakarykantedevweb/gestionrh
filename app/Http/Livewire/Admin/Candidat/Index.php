<?php

namespace App\Http\Livewire\Admin\Candidat;

use App\Models\Candidat;
use Livewire\Component;

class Index extends Component
{
    public $candidats;
    public function render()
    {
        $this->candidats = Candidat::get();
        return view('livewire.admin.candidat.index');
    }
}
