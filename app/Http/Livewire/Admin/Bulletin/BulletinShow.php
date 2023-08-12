<?php

namespace App\Http\Livewire\Admin\Bulletin;

use App\Models\Agent;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Bulletin;

class BulletinShow extends Component
{
    public $agents, $periodes, $bulletins,$agent_id,$periode_id,$id_bulletin;

    protected function rules()
    {
        return [
            'agent_id' => 'required|integer',
            'periode_id' => 'required|integer',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveBulletin()
    {
        $validatedData = $this->validate();
        try {
            $dep = new Bulletin();
            $dep->agent_id = $validatedData['agent_id'];
            $dep->periode_id = $validatedData['periode_id'];
            $dep->save();
            session()->flash('message', 'Bulletin ajouter avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function editBulletin(int $id_bulletin)
    {
        $dep = Bulletin::find($id_bulletin);
        if ($dep) {
            $this->id_bulletin = $id_bulletin;
            $this->agent_id = $dep->agent_id;
            $this->periode_id = $dep->periode_id;
        }
    }

    public function updateBulletin()
    {
        $validatedData = $this->validate();
        try {
            $dep = Bulletin::find($this->id_bulletin);
            $dep->agent_id = $validatedData['agent_id'];
            $dep->periode_id = $validatedData['periode_id'];
            $dep->save();
            session()->flash('message', 'Bulletin Modifier avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function deleteBulletin(int $id_bulletin)
    {
        $this->id_bulletin = $id_bulletin;
    }

    public function destroyBulletin()
    {
        try {
            Bulletin::where('id', $this->id_bulletin)->delete();
            session()->flash('message', 'Bulletin Supprimé avec Success');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->agent_id = '';
        $this->periode_id = '';
    }
    public function render()
    {
        $this->agents = Agent::get();
        $this->periodes = Periode::get();
        $this->bulletins = Bulletin::get();
        return view('livewire.admin.bulletin.bulletin-show');
    }
}
