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
    public $performance_id;

    public $notes = [];

    public function voirQuestion($id)
    {
        $this->performance_id = $id;
        $this->questionListes = PerformanceQuestion::where('performance_id', $id)->orderBy('id', 'ASC')->get();
        $this->createNote = True;
        $this->afficheListe = False;
    }

    public function voirNote($id)
    {
        $this->questionListes = PerformanceQuestion::where('performance_id', $id)->orderBy('id', 'ASC')->get();
    }

    public function retour()
    {
        $this->afficheListe = True;
        $this->createNote = False;
    }

    public function saveQuestionNote()
    {
        $cleTaleau = array_keys($this->notes);
        $noteTableau = array_values($this->notes);
        for($i = 0; $i < count($cleTaleau); $i++)
        {
            $performanceQuestion = PerformanceQuestion::where('performance_id', $this->performance_id)
                                    ->where('question_id',$cleTaleau[$i])->first();
            $performanceQuestion->note = $noteTableau[$i];
            $performanceQuestion->save();
        }
        toastr()->success('Les notes ont été enregistrées avec succès.');
        $this->afficheListe = True;
        $this->createNote = False;
    }

    public function render()
    {
        $this->performances = Performance::where('superieur_id',Auth::guard('webagent')->user()->id)->get();
        return view('livewire.agent.performance.index');
    }
}
