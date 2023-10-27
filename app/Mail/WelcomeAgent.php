<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeAgent extends Mailable
{
    use Queueable, SerializesModels;


    public $data = [];

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from("kantebakary742@gmail.com") // L'expéditeur
        ->subject("Gestion des RH") // Le sujet
        ->view('mail.welcomeAgent', $this->data); // La vue
    }
}
