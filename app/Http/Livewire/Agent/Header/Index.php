<?php

namespace App\Http\Livewire\Agent\Header;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function logout()
    {
        // dd('ok');
        Auth::guard('webagent')->logout(); // Assurez-vous que le nom du garde correspond à celui que vous avez défini dans votre configuration

        toastr()->success('Merci pour votre visite');

        return redirect('login-agent');
    }

    public function render()
    {
        return view('livewire.agent.header.index');
    }
}
