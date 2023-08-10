<?php

namespace App\Http\Controllers;

use App\Models\User;

//Importation des classes pour le mail
use App\Mail\MessageGoogle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    // Le formulaire du message
    public function formMessageGoogle()
    {
        return view("forms.message-google");
    }

    // Envoi du mail aux utilisateurs
    public function sendMessageGoogle(Request $request)
    {

        #1. Validation de la requête
        $this->validate($request, ['message' => 'bail|required']);

        #2. Récupération des utilisateurs
        $users = User::all();

        #3. Envoi du mail
        Mail::to($users)->bcc($request->email)
            ->queue(new MessageGoogle($request->all()));

        return back()->withText("Message envoyé");
    }
}
