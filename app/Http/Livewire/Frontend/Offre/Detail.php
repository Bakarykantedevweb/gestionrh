<?php

namespace App\Http\Livewire\Frontend\Offre;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Candidat;
use App\Models\Postuler;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Detail extends Component
{
    use WithFileUploads;
    public $offre;
    public $cv,$lettre;

    // public function mount()
    // {
    //     $candidat = Candidat::where('id', Auth::guard('candidat')->user()->id)->first();
    //     dd($candidat);
    // }

    protected function rules()
    {
        return [
            'cv' => 'required|mimes:pdf',
            'lettre' => 'required|mimes:pdf',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SavePostuler()
    {
        $validatedData = $this->validate();
        if(Postuler::where('offre_id',$this->offre->id)->where('candidat_id',Auth::guard('candidat')->user()->id)->exists())
        {
            toastr()->error('Vous avez deja Postuler a cette offre');
            return redirect('offres');
        }
        else
        {
            $postuler = new Postuler;
            $postuler->offre_id = $this->offre->id;
            $postuler->candidat_id = Auth::guard('candidat')->user()->id;
            $postuler->save();
            if($postuler)
            {
                $candidat = Candidat::where('id', Auth::guard('candidat')->user()->id)->first();
                // CV
                $imageName = Carbon::now()->timestamp . '.' . $this->cv->extension();
                $this->cv->storeAs('frontend/candidat/cv/', $imageName);
                $candidat->cv = $imageName;

                // Lettre
                $imageNamelettre = Carbon::now()->timestamp . '.' . $this->lettre->extension();
                $this->lettre->storeAs('frontend/candidat/lettre/', $imageNamelettre);
                $candidat->lettre = $imageNamelettre;

                $candidat->save();

                toastr()->success('Votre demande a bien ete prise en compte Merci');
                return redirect('offres/'.$this->offre->titre);
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.offre.detail');
    }
}
