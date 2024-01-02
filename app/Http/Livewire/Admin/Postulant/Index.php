<?php

namespace App\Http\Livewire\Admin\Postulant;

use Livewire\Component;
use App\Models\Postuler;
use App\Mail\AccepteCandidatMail;
use Illuminate\Support\Facades\Mail;

class Index extends Component
{
    public $postulersEnAttente;
    public $postulersRejete;
    public $postulersAccepte;
    public $idsCoches;
    public $selectedItems = [];
    public $status;

    public $OffreEnAttente = true;
    public $OffreAccepte = false;
    public $OffreRejete = false;

    private function disableContents()
    {
        $this->OffreEnAttente = false;
        $this->OffreAccepte = false;
        $this->OffreRejete = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    public function traiterElementsCoches()
    {
        // Récupérez les ID des éléments cochés
        $this->idsCoches = array_keys(array_filter($this->selectedItems));
        // Maintenant, vous avez les ID des éléments cochés dans le tableau $idsCoches
        // Vous pouvez les utiliser pour effectuer des opérations ou des mises à jour
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

    public function UpdatePostuler()
    {
        $validatedData = $this->validate();

        // try {
            // Vérifiez si des éléments ont été cochés
            if (count($this->idsCoches) > 0) {
                // Si le statut est "Validé" (Accepté), envoyez un e-mail
                if ($validatedData['status'] == '1') {
                    $postulerDetail = Postuler::where('id', $this->idsCoches)->first();
                    $data = [
                        'nom' => $postulerDetail->candidat->nom,
                        'prenom' => $postulerDetail->candidat->prenom,
                        'titre' => $postulerDetail->offre->titre,
                    ];
                    Mail::to($postulerDetail->candidat->email)
                        ->queue(new AccepteCandidatMail($data));
                }
                // Mettez à jour les enregistrements correspondants dans la base de données
                Postuler::whereIn('id', $this->idsCoches)->update(['status' => $validatedData['status']]);
            }
            toastr()->success('Offre Valider avec success');
            return redirect('admin/postulants');
        // } catch (\Throwable $th) {
        //     // Gérez les exceptions ici (log, notification, etc.)
        //     toastr()->error('Une erreur est survenue lors du traitement de la page',$th);
        //     return redirect('admin/postulants');
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
        $this->postulersEnAttente = Postuler::where('status', '0')->get();
        $this->postulersAccepte = Postuler::where('status', '1')->get();
        $this->postulersRejete = Postuler::where('status', '2')->get();
        return view('livewire.admin.postulant.index');
    }
}
