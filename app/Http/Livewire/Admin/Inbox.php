<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class Inbox extends Component
{
    public $contactListes;
    public $detailInbox;
    public $afficherInbox = True;
    public $afficherDetail = False;

    public function afficheDetail($id)
    {
        $this->detailInbox = Contact::where('id', $id)->first();
        $this->afficherDetail = True;
        $this->afficherInbox = False;
    }

    public function render()
    {
        $this->contactListes = Contact::where('status', '0')->orderBy('id', 'DESC')->get();
        return view('livewire.admin.inbox');
    }
}
