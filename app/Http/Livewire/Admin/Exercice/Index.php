<?php

namespace App\Http\Livewire\Admin\Exercice;

use App\Models\Exercice;
use Livewire\Component;

class Index extends Component
{
    public $exercices;
    public function render()
    {
        $this->exercices = Exercice::get();
        return view('livewire.admin.exercice.index');
    }
}
