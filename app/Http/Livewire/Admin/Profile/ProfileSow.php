<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ProfileSow extends Component
{
    use WithFileUploads;
    public function mount()
    {

    }

    public function updated($champs)
    {
        $this->validateOnly($champs,[
            'photo' => 'required|image|max:1024',
            'telephone' => 'required|integer',
            'adresse' => 'required|string',
        ]);
    }

    public function UpdateProfile()
    {
        $this->validate([
            'photo' => 'required|image|max:1024',
            'telephone' => 'required|integer',
            'adresse' => 'required|string',
        ]);

        $user = User::where('id',Auth::user()->id)->get();
        $user->telephone = $this->telephone;
        $user->adresse = $this->adresse;

        $imageName = Carbon::now()->timestamp. '.'.$this->photo->extension();
        $this->photo->storeAs('admin',$imageName);

        $user->photo = $imageName;
        $user->save();
    }


    public $telephone, $adresse,$photo;
    public function render()
    {
        return view('livewire.admin.profile.profile-sow');
    }
}
