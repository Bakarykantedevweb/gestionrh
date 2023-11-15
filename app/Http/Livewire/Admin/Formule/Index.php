<?php

namespace App\Http\Livewire\Admin\Formule;

use App\Models\Formule;
use Livewire\Component;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class Index extends Component
{
    public $formule_id,$formules;
    public $agent_id, $nom, $formule;
    // public $variables;

    public $selectedFormule;
    public $variables;
    public $variableValues = [];
    public $result;

    protected $rules = [
        'nom' => 'required|',
        'formule' => 'required',
        'variables' => 'required',
    ];

    public function mount()
    {
        $this->formules = Formule::all();
    }

    public function updatedSelectedFormule()
    {
        if ($this->selectedFormule) {
            $formule = Formule::find($this->selectedFormule);
            $this->variables = json_decode($formule->variables, true);
        }
    }

    public function updatedVariableValues()
    {
        if ($this->selectedFormule) {
            $formule = Formule::find($this->selectedFormule);
            $expressionLanguage = new ExpressionLanguage();
            $variables = [];

            foreach ($this->variables as $variable) {
                $variables[$variable] = $this->variableValues[$variable];
            }

            $this->result = $expressionLanguage->evaluate($formule->formule, $variables);
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function calculateFormula()
    {
        $formula = Formule::find($this->selectedFormula);

        if ($formula) {
            // Extraire les noms des variables de la formule
            preg_match_all('/\w+/', $formula->formule, $matches);
            $variableNames = $matches[0];

            // Assurez-vous que les noms de variables sont uniques
            $variableNames = array_unique($variableNames);

            $expressionLanguage = new ExpressionLanguage();
            $variables = [];

            foreach ($variableNames as $variableName) {
                if (isset($this->variables[$variableName])) {
                    $variables[$variableName] = $this->variables[$variableName];
                }
            }

            $result = $expressionLanguage->evaluate($formula->formule, $variables);
            $this->result = $result;
        }
    }

    public function saveFormule()
    {
        $validatedData = $this->validate();
        try {
            $formule = Formule::find($this->formule_id) ?? new Formule;
            $formule->nom = $validatedData['nom'];
            $formule->formule = $validatedData['formule'];
            $formule->variables = json_encode(explode(',', $validatedData['variables']));
            $formule->save();

            // Évaluez la formule
            $expressionLanguage = new ExpressionLanguage();
            $variables = json_decode($formule->variables, true); // Notez le true pour obtenir un tableau associatif
            $result = $expressionLanguage->evaluate($formule->formule, $variables);

            session()->flash('message', 'Opération effectuée avec succès. Résultat : ' . $result);
        } catch (\Throwable $th) {
            session()->flash('error', 'Une erreur est survenue lors du traitement: ' . $th->getMessage());
        } finally {
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }


    public function editformule($id)
    {
        $formule = Formule::find(decrypt($id));
        if ($formule) {
            $this->formule_id = $formule->id;
            $this->nom = $formule->nom;
            $this->formule = $formule->formule;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->formule = '';
    }
    public function render()
    {
        return view('livewire.admin.formule.index');
    }
}
