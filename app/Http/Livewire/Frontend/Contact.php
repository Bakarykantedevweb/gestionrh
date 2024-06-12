<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $nom_complet,$sujet,$email,$telephone,$message;

    protected function rules()
    {
        return [
            'nom_complet' => 'required|string',
            'sujet' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|regex:/^[0-9]{8}$/',
            'message' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveContact()
    {
        $validatedData = $this->validate();
        try {
            //code...
            $contact = new ModelsContact();
            $contact->nom_complet = $validatedData['nom_complet'];
            $contact->sujet = $validatedData['sujet'];
            $contact->email = $validatedData['email'];
            $contact->telephone = $validatedData['telephone'];
            $contact->message = $validatedData['message'];
            $contact->save();
            toastr()->success('Votre demande a bien été prise en compte Merci 👌👌👌');
            return redirect('/contact');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error('Une erreur est survenue lors du traitement de la page ');
        }
    }

    public function render()
    {
        return view('livewire.frontend.contact');
    }
}
