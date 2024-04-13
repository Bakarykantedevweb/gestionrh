<?php

namespace App\Http\Livewire\Admin\Conge;

use App\Models\Conge;
use App\Models\Contrat;
use Livewire\Component;

class Index extends Component
{
    public $status;
    public $conge_id;

    public $congeEnAttendeListes;
    public $congeValideListes;
    public $congeRejeteListes;

    public $congeEnAttende = true;
    public $congeValide = false;
    public $congeRejete = false;

    private function disableContents()
    {
        $this->congeEnAttende = false;
        $this->congeValide = false;
        $this->congeRejete = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    protected function rules()
    {
        return [
            'status' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function editConge($id)
    {
        $this->conge_id = $id;
    }

    public function UpdateConge()
    {
        $validatedData = $this->validate();
        // try {
            $conge = Conge::where('id', $this->conge_id)->first();

            if($validatedData['status'] == '1')
            {
                $contrat = Contrat::where('agent_id',$conge->agent_id)->first();
                $contrat->nombre_jour_conge = $contrat->nombre_jour_conge - $conge->duree;
                $contrat->save();

                $conge->status = 1;
                $conge->save();
                toastr()->success('Operation effectue avec sucess');
                return redirect('admin/conges');
            }
            else if($validatedData['status'] == '2')
            {
                $conge->status = 2;
                $conge->save();
                toastr()->success('Operation effectue avec sucess');
                return redirect('admin/conges');
            }
        // } catch (\Throwable $th) {
        //     toastr()->error('Une erreur est survenue lors du traitement de page',$th);
        // }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->status = '';
    }

    public function render()
    {
        $this->congeEnAttendeListes = Conge::where('status','0')->get();
        $this->congeValideListes = Conge::where('status', '1')->get();
        $this->congeRejeteListes = Conge::where('status', '2')->get();
        return view('livewire.admin.conge.index');
    }
}
