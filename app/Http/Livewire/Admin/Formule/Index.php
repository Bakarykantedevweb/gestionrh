<?php

namespace App\Http\Livewire\Admin\Formule;

use App\Models\Formule;
use Livewire\Component;
use App\Models\Variable;
use Illuminate\Support\Facades\DB;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class Index extends Component
{
    public $formule_id,$formules;
    public $agent_id, $nom, $formule;
    public $variables;
    public $selectedVariables = [];
    public $variablesManuelles = [];
    public $selectedFormuleId;
    public $valeursVariables = [];

    protected $rules = [
        'nom' => 'required|',
        'formule' => 'required',
        ];


    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


    // Mettez à jour la méthode updateFormule
    public function updateFormule()
    {
        // Variables sélectionnées à partir des cases à cocher
        $selectedVariableNames = Variable::whereIn('id', $this->selectedVariables)->pluck('nom')->toArray();

        // Formule manuelle
        $formuleManuelle = trim($this->formule);

        // Séparez les variables existantes dans la formule manuelle
        $variablesExistantes = array_map('trim', explode('+', $formuleManuelle));

        // Ajoutez les nouvelles variables à la liste existante, évitant les doublons
        $formuleAvecVariables = implode(' + ', array_unique(array_merge($selectedVariableNames, $variablesExistantes)));

        // Mettez à jour la formule finale avec les variables et la formule manuelle
        $this->formule = $formuleAvecVariables;
    }

    // Ajoutez une méthode pour gérer les clics sur les noms de variables
    public function addVariableToFormule($variableId)
    {
        // Ajoutez la variable à la liste des variables sélectionnées
        $this->selectedVariables[] = $variableId;

        // Mettez à jour la formule en conséquence
        $this->updateFormule();
    }


    public function mount()
    {
        // Chargez les formules depuis la base de données
        $this->formules = Formule::all();
    }

    public function updatedSelectedFormuleId()
    {
        if ($this->selectedFormuleId) {
            $formule = Formule::with('variables')->find($this->selectedFormuleId);
            $this->variables = $formule ? $formule->variables : [];
            //dd($formule->variables);
        }
    }


    public function saveFormule()
    {
        $validatedData = $this->validate();

        try {
            DB::beginTransaction();

            $formule = new Formule();
            if ($this->formule_id) {
                $formule = Formule::find($this->formule_id);
            }
            $formule->nom = $validatedData['nom'];
            $formule->formule = $validatedData['formule'];
            $formule->save();

            // Variables sélectionnées à partir des cases à cocher
            $selectedVariables = Variable::whereIn('id', $this->selectedVariables)->get();

            // Associez chaque variable à sa valeur par défaut
            $variables = [];
            foreach ($selectedVariables as $variable) {
                $variables[$variable->nom] = $variable->valeur;
            }

            // Utilisez l'expression language pour évaluer la formule avec les variables
            $expressionLangage = new ExpressionLanguage();
            $resultat = $expressionLangage->evaluate($this->formule, $variables);

            // Attachez les variables à la formule via la table pivot
            $formule->variables()->sync($selectedVariables->pluck('id'));

            DB::commit();

            toastr()->success('Opération effectuée avec succès. Résultat : ' . $resultat);
            return redirect('admin/formules');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Une erreur est survenue lors du traitement : ' . $th->getMessage());
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
        // $this->formules = Formule::get();
        $this->variables = Variable::get();
        return view('livewire.admin.formule.index');
    }
}
