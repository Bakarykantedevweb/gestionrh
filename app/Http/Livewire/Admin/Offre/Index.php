<?php

namespace App\Http\Livewire\Admin\Offre;

use App\Models\Offre;
use Livewire\Component;

class Index extends Component
{
    public $offres;
    public $OffrehistoriqueListe;
    public $Offre = True;
    public $Offrehistorique = False;

    public $date_limite,$offre_id;

    protected function rules()
    {
        return [
            'date_limite' => 'required|date|after_or_equal:now',
        ];
    }


    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    private function disableContents()
    {
        $this->Offre = false;
        $this->Offrehistorique = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    public function relancerOffre($id)
    {
        $this->offre_id = $id;
    }

    public function saveRelancer()
    {
        $validatedData = $this->validate();
        $offre =  Offre::where('id',$this->offre_id)->first();
        $offre->date_limite = $validatedData['date_limite'];
        $offre->save();
        toastr()->success('Offre Relancer avec Success');
        return redirect('admin/offres');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->date_limite = '';
    }

    public function render()
    {
        $this->offres = Offre::where('date_limite', '>', now())->orderBy('id', 'desc')->get();
        $this->OffrehistoriqueListe = Offre::where('date_limite', '<', now())->get();
        return view('livewire.admin.offre.index');
    }
}
