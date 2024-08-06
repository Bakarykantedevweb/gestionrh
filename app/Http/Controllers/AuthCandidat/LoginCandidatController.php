<?php

namespace App\Http\Controllers\AuthCandidat;

use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cookie;

class LoginCandidatController extends Controller
{
    public function index()
    {
        return view('auth-candidat.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('webcandidat')->attempt($credentials)) {
            // Authentification réussie
            toastr()->success('Bienvenue sur la plateforme OptiRH');
            return redirect('/');
        }

        // Authentification échouée
        toastr()->error('Email ou mot incorrect');
        return redirect('login-candidat');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $candidat = Socialite::driver('google')->user();
            $findCandidat = Candidat::where('email', $candidat->email)->first();
            if ($findCandidat) {
                Auth::guard('webcandidat')->login($findCandidat);
                toastr()->success('Bienvenue sur la plateforme OptiRH');
                return redirect('/');

            }
            else
            {
                $newCandidat = Candidat::updateOrCreate(
                    ['email' => $candidat->email],
                    [
                        'nom' => $candidat->name,
                        'prenom' => 'Non defini',
                        'username' => 'Non defini',
                        'telephone' => '00000000',
                        'photo' => $candidat->avatar,
                        'password' => Hash::make('password'),
                    ]
                );

                Auth::guard('webcandidat')->login($newCandidat);
                toastr()->success('Bienvenue sur la plateforme OptiRH');
                return redirect('/');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('webcandidat')->logout();

        toastr()->success('Merci pour votre visite');
        return redirect('/');
    }
}
