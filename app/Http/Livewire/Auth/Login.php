<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email, $password, $otp, $qrCode, $google2faSecret;
    public $gRecaptchaResponse;  // Propriété pour le reCAPTCHA
    public $showPassword = false;

    protected function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'otp' => 'required|numeric',
            // 'gRecaptchaResponse' => 'required|recaptcha',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function generateQrCode()
    {
        // Initialiser Google2FA
        $google2fa = app('pragmarx.google2fa');

        // Générer le secret OTP
        $this->google2faSecret = $google2fa->generateSecretKey();

        // Générer le QR code pour le scanner
        $this->qrCode = $google2fa->getQRCodeInline(
            "OptiRH",
            $this->email, // Utiliser l'email saisi par l'utilisateur
            $this->google2faSecret
        );
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!$user || !Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if ($user->google2fa_secret) {
            $google2fa = new Google2FA();
            if (!$google2fa->verifyKey($user->google2fa_secret, $this->otp)) {
                throw ValidationException::withMessages([
                    'otp' => ['The provided OTP is incorrect.'],
                ]);
            }
        }

        Auth::login($user);
        return redirect('admin/dashboard'); // Redirect to intended page or dashboard
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
