<?php

namespace App\Http\Livewire\Admin\Performance;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Question;
use App\Models\Performance;

class Index extends Component
{
    public $afficherListe = True;
    public $createPerformance = False;

    public $agents;

    public $performances;

    public $agent_id, $superieur_id, $date;

    public $questions = [];

    protected function rules()
    {
        return [
            'agent_id' => 'required|integer',
            'superieur_id' => 'required|integer',
            'date' => 'required|date',
        ];
    }


    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function addQuestion()
    {
        $this->questions[] = ['question' => ''];
    }

    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions);
    }

    public function activeContent()
    {
        $this->createPerformance = true;
        $this->afficherListe = false;
    }

    public function retour()
    {
        $this->createPerformance = false;
        $this->afficherListe = true;
    }


    public function savePerformance()
    {
        $validatedData = $this->validate();

        $performance = Performance::create([
            'agent_id' => $validatedData['agent_id'],
            'superieur_id' => $validatedData['superieur_id'],
            'date' => $validatedData['date'],
        ]);

        foreach ($this->questions as $questionData) {
            $question = Question::create([
                'libelle' => $questionData['question'],
            ]);
            $performance->questions()->attach($question->id, ['status' => 0]);
        }
        $this->reset(['agent_id', 'superieur_id', 'date', 'questions']);
        toastr()->success('Performance ajoutée avec succès.');

        $this->createPerformance = false;
        $this->afficherListe = true;
    }

    public function render()
    {
        $this->agents = Agent::get();
        $this->performances = Performance::get();
        return view('livewire.admin.performance.index');
    }
}
