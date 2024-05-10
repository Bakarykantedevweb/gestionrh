<?php

namespace App\Http\Livewire\Candidat;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Candidat;
use App\Models\Postuler;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Component
{
    use WithFileUploads;
    public $postulers;

    public $dashboard = true;
    public $profile = false;
    public $changePassword = false;
    public $cv = false;

    public $nom, $prenom, $username, $email, $telephone, $date_naissance, $adresse, $sexe;

    public $photo;

    public $old_password, $new_password, $confirm_password;


    public function mount()
    {
        $this->postulers = Postuler::where('candidat_id', Auth::guard('webcandidat')->user()->id)->orderBy('id', 'DESC')->get();

        $this->nom = Auth::guard('webcandidat')->user()->nom;
        $this->prenom = Auth::guard('webcandidat')->user()->prenom;
        $this->username = Auth::guard('webcandidat')->user()->username;
        $this->email = Auth::guard('webcandidat')->user()->email;
        $this->telephone = Auth::guard('webcandidat')->user()->telephone;
        $this->date_naissance = Auth::guard('webcandidat')->user()->date_naissance;
        $this->adresse = Auth::guard('webcandidat')->user()->adresse;
        $this->sexe = Auth::guard('webcandidat')->user()->sexe;
    }

    private function disableContents()
    {
        $this->dashboard = false;
        $this->profile = false;
        $this->changePassword = false;
        $this->cv = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    public function UpdateCandidat()
    {
        $rules = [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string',
            'sexe' => 'required|string',
        ];

        // Ajoutez la règle de validation pour la photo seulement si elle est présente
        if ($this->photo) {
            $rules['photo'] = 'image|mimes:png,jpg,jpeg';
        }

        $this->validate($rules);

        try {
            $candidat = Candidat::find(Auth::guard('webcandidat')->user()->id);
            $candidat->nom = $this->nom;
            $candidat->prenom = $this->prenom;
            $candidat->username = $this->username;
            $candidat->email = $this->email;
            $candidat->telephone = $this->telephone;
            $candidat->date_naissance = $this->date_naissance;
            $candidat->adresse = $this->adresse;
            $candidat->sexe = $this->sexe;

            // Traitement de l'image si elle a été fournie
            if ($this->photo) {
                $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
                $this->photo->storeAs('frontend/candidat/profile/', $imageName);
                $candidat->photo = $imageName;
            }

            $candidat->save(); // Sauvegarde du candidat après mise à jour

            toastr()->success('Profil mis à jour avec succès');
            return redirect('dashboard-candidat');
        } catch (\Throwable $th) {
            toastr()->error('Une erreur est survenue lors du traitement de la page');
            return back(); // Redirection en cas d'erreur
        }
    }

    protected function rules()
    {
        return [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function UpdatePassword()
    {
        $validatedData = $this->validate();
        $candidat = Candidat::where('id', Auth::guard('webcandidat')->user()->id)->first();
        if (!password_verify($validatedData['old_password'], $candidat->password)) {
            toastr()->error("L'ancien mot de passe n'est pas bon");
            $this->old_password = '';
        } else {
            if ($validatedData['new_password'] != $this->confirm_password) {
                toastr()->error("Les deux mots de passe ne sont pas les memes");
                $this->new_password = '';
                $this->confirm_password = '';
            } else {
                $candidat->password = Hash::make($validatedData['new_password']);
                $candidat->save();

                $this->old_password = '';
                $this->new_password = '';
                $this->confirm_password = '';
                toastr()->success('Votre Mot de passe a ete modifié avec success');
            }
        }
    }




    public function render()
    {
        return view('livewire.candidat.dashboard');
    }
}
