<?php

namespace App\Http\Livewire\Agent\Performance;

use Livewire\Component;
use App\Models\Performance;
use App\Models\PerformanceQuestion;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $performances;

    public $questionListes = [];

    public $afficheListe = True;
    public $createNote = False;

    public $note = [];

    public function voirQuestion($id)
    {
        $this->questionListes = PerformanceQuestion::where('performance_id', $id)->get();
        $this->createNote = True;
        $this->afficheListe = False;
    }

    public function retour()
    {
        $this->afficheListe = True;
        $this->createNote = False;
    }

    public function saveQuestionNote()
    {
        dd($this->note);
    }

    public function render()
    {
        $this->performances = Performance::where('superieur_id',Auth::guard('webagent')->user()->id)->get();
        return view('livewire.agent.performance.index');
    }
}
