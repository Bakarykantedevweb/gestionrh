<?php

namespace App\Http\Livewire\Admin\Performance;

use Exception;
use App\Models\Agent;
use Livewire\Component;
use App\Models\Question;
use App\Models\Performance;
use App\Models\PerformanceQuestion;

class Index extends Component
{
    public $afficherListe = True;
    public $createPerformance = False;

    public $agents;

    public $performances;

    public $agent_id, $superieur_id, $date;

    public $questions = [];

    public $questionListes = [];

    public $performance_id, $status;

    protected function rules()
    {
        return [
            'agent_id' => 'required|',
            'superieur_id' => 'required|',
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
        // dd($this->agent_id);
        $validatedData = $this->validate();

        $performance = Performance::create([
            'agent_id' => $validatedData['agent_id'],
            'superieur_id' => $validatedData['superieur_id'],
            'date' => $validatedData['date'],
            'status' => 0
        ]);

        foreach ($this->questions as $questionData) {
            $question = Question::create([
                'libelle' => $questionData['question'],
            ]);
            $performance->questions()->attach($question->id);
        }
        $this->reset(['agent_id', 'superieur_id', 'date', 'questions']);
        toastr()->success('Performance ajoutée avec succès.');

        $this->createPerformance = false;
        $this->afficherListe = true;
    }

    public function voirQuestion($id)
    {
        $this->questionListes = PerformanceQuestion::where('performance_id', $id)->orderBy('id', 'ASC')->get();
    }

    public function editPerformance($id)
    {
        $this->performance_id = $id;
    }

    public function UpdatePerformance()
    {
        try {
            // Récupérer l'instance de Performance par son identifiant
            $performance = Performance::find($this->performance_id);

            if ($performance) {
                // Mettre à jour le statut
                $performance->update([
                    'status' => $this->status,
                ]);

                // Afficher un message de succès
                session()->flash('success', 'Operation effectuée avec succès');
            } else {
                // Afficher un message d'erreur si l'instance n'est pas trouvée
                session()->flash('error', 'Performance non trouvée');
            }
        } catch (Exception $e) {
            // Gérer les exceptions et afficher un message d'erreur
            session()->flash('error', 'Une erreur est survenue : ' . $e->getMessage());
        }

        // Rediriger vers la page des performances
        return redirect('admin/performances');

    }

    public function render()
    {
        $this->agents = Agent::get();
        $this->performances = Performance::get();
        return view('livewire.admin.performance.index');
    }
}
