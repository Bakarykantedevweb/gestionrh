<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Auth;

class TwoFactorSetup extends Component
{
    public $qrCodeUrl;
    public $google2faSecret;

    public function mount()
    {
        $user = Auth::user();
        $google2fa = new Google2FA();

        $this->google2faSecret = $user->google2fa_secret ?: $google2fa->generateSecretKey();
        $this->updateQRCode();
    }

    public function generateQrCode()
    {
        $google2fa = new Google2FA();
        $this->google2faSecret = $google2fa->generateSecretKey();
        $this->updateQRCode();

        $user = Auth::user();
        $user->google2fa_secret = $this->google2faSecret;
        $user->save();
    }

    private function updateQRCode()
    {
        $google2fa = new Google2FA();
        $this->qrCodeUrl = $google2fa->getQRCodeUrl(
            'OptiRH',
            Auth::user()->email,
            $this->google2faSecret
        );
    }
    
    public function render()
    {
        return view('livewire.auth.two-factor-setup');
    }
}
