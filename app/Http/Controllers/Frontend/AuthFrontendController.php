<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthFrontendController extends Controller
{
    public function index()
    {
        return view('auth-frontend.login');
    }

    public function autenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;
        $candidat = Candidat::where('email', $email)->first();
        if (!empty($candidat))
        {
            if (Hash::check($password, $candidat->password))
            {
                Auth::guard('candidat')->attempt(['email' => $email, 'password' => $password]);
                // Auth::guard('professeur')->user()->photo)
                toastr()->success('Operation effectue avec success');
                return redirect('/');
            }

            toastr()->error('Email ou Mot de passe incorrect', 'Erreur: ');
            return redirect('login-candidat');
        }
        toastr()->error('Email ou Mot de passe incorrect', 'Erreur: ');
        return redirect('login-candidat');
    }

    public function logout()
    {
        Auth::guard('candidat')->logout();
        toastr()->success('Merci pour votre visite');
        return redirect('/');
    }
}
