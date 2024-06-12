<?php

namespace App\Http\Livewire\Frontend\Offre;

use Carbon\Carbon;
use App\Models\Offre;
use Livewire\Component;
use App\Models\Candidat;
use App\Models\Postuler;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Detail extends Component
{
    use WithFileUploads;

    public $offre;
    public $offreSimilaires;

    public $checkPostuler;

    public $cv, $lettre;

    public function mount()
    {
        $this->offreSimilaires = Offre::where('categorie_id',$this->offre->categorie_id)->where('id','!=',$this->offre->id)->get();
        if(Auth::guard('webcandidat')->check())
        {
            $this->checkPostuler = Postuler::where('offre_id',$this->offre->id)->where('candidat_id',Auth::guard('webcandidat')->user()->id)->exists();
        }
    }

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
        try {
            if(Postuler::where('offre_id',$this->offre->id)->where('candidat_id',Auth::guard('webcandidat')->user()->id)->exists())
            {
                toastr()->error('Vous avez deja postuler a cet offre');
                return redirect('offres/'.$this->offre->titre.'/detail');
            }
            $postuler = new Postuler;
            $postuler->offre_id = $this->offre->id;
            $postuler->candidat_id = Auth::guard('webcandidat')->user()->id;
            $postuler->save();
            if($postuler)
            {
                $candidat = Candidat::where('id', Auth::guard('webcandidat')->user()->id)->first();
                $cv = Carbon::now()->timestamp . '.' . $validatedData['cv']->extension();
                $validatedData['cv']->storeAs('frontend/candidat/cv', $cv);
                $candidat->cv = $cv;

                $lettre = Carbon::now()->timestamp . '.' . $validatedData['lettre']->extension();
                $validatedData['lettre']->storeAs('frontend/candidat/lettre', $lettre);
                $candidat->lettre = $lettre;
                $candidat->save();

                toastr()->success('Votre demande est bien ete prise en compte');
                return redirect('offres/' . $this->offre->titre . '/detail');
            }
        } catch (\Throwable $th) {
            toastr()->error('Une erreur est survenue lors du traitement de page');
        }
    }

    public function render()
    {
        return view('livewire.frontend.offre.detail');
    }
}
