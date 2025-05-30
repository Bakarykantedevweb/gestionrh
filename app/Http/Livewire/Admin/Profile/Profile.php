<?php

namespace App\Http\Livewire\Admin\Profile;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Google2FA;

class Profile extends Component
{
    public $telephone, $adresse,$photo,$password, $password_confirmation;
    public $name,$email;
    public $otp;
    use WithFileUploads;

    public function mount()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $this->telephone = $user->telephone;
        $this->adresse = $user->adresse;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected $rules = [
        'telephone' => 'min:8',
        'adresse' => 'string',
        'name' => 'string|string',
        'email' => 'string|email',
        'photo' => 'image|max:1024',
        'password' => ['confirmed', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages = [
        'password' => '
            Contient au moins une lettre majuscule.
            Contient au moins une lettre minuscule.
            Contient au moins un chiffre.
            Contient au moins un caractère spécial parmi @, $, !, %, *, ?, &.
            A une longueur minimale de 10 caractères.
        ',
    ];

    public function otp()
    {
        $user = User::find(Auth::user()->id);
        $google2fa = app('pragmarx.google2fa');
        $otp = $google2fa->generateSecretKey();
        $QR_image = $google2fa->getQRCodeInline(
            "OptiRH",
            Auth::user()->email,
            $otp
        );
        $user->google2fa_secret = null;
        $user->save();
        $this->otp = $QR_image;
    }



    public function updateUser()
    {
        $validatedData = $this->validate();
        $user = User::where('id', Auth::user()->id)->first();
        $user->telephone = $validatedData['telephone'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->adresse = $validatedData['adresse'];
        $user->password = $validatedData['password'];
        $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
        $this->photo->storeAs('admin/profile/', $imageName);
        $user->photo = $imageName;
        $user->update();
        return redirect('admin/profiles')->with('message','Profile Mise a jour avec success');
    }

    public function saveAuthentificator()
    {
        $user = User::find(Auth::user()->id);
        $user->google2fa_secret = $this->otp;
        $user->save();
        $this->dispatchBrowserEvent("close-modal");
    }

    public function render()
    {
        $google2fa = app(Google2FA::class);
        if(! $google2fa->isActivated(Auth::user()))
        {
            $google2fa = app('pragmarx.google2fa');
            $otp = $google2fa->generateSecretKey();  
            $QR_Image = $google2fa->getQRCodeInline(
                "OptiRH",
                Auth::user()->email,
                $otp
            );
            if(!Auth::user()->google2fa_secret)
            {
                $this->otp = $QR_Image;
            }
        }
        return view('livewire.admin.profile.profile');
    }
}
