<?php

namespace App\Http\Livewire\Agent\Sidebar;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function deconnexion()
    {
        // dd(Auth::guard('webagent'));
        Auth::guard('webagent')->logout();
        session()->invalidate();
        session()->regenerateToken();
        toastr()->success('Merci pour votre visite');
        
        return redirect()->to('login-agent');
    }

    public function render()
    {
        return view('livewire.agent.sidebar.index');
    }
}
