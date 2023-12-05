<?php

namespace App\Http\Livewire\Admin\Variable;

use App\Models\Variable;
use Livewire\Component;

class Index extends Component
{
    public $variable_id;
    public $nom;
    public $variables;
    protected function rules()
    {
        return [
            'nom' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveVariable()
    {
        $validatedData = $this->validate();
        try {
            $variable = new Variable();
            if($this->variable_id){
                $variable = Variable::find($this->variable_id);
            }

            $variable->nom = $validatedData['nom'];
            $variable->save();
            session()->flash('message', 'Operation effectue avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editvariable($id)
    {
        $variable = Variable::find(decrypt($id));
        if ($variable) {
            $this->variable_id = $variable->id;
            $this->nom = $variable->nom;
        }
    }

    public function deletevariable($id)
    {
        $this->variable_id = decrypt($id);
    }

    public function DestroyVariable()
    {
        Variable::where('id', '=', $this->variable_id)->delete();
        session()->flash('message', 'Operation effectue avec Success');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
    }
    public function render()
    {
        $this->variables = Variable::get();
        return view('livewire.admin.variable.index');
    }
}
