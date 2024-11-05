<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details; // Propriété pour stocker les détails du message

    /**
     * Create a new message instance.
     * @param array $details
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details; // Initialisation des détails
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this-> from('roihatibinti@gmail.com')
         ->subject('Nouvelle demande de contact') // Sujet de l'email
                    ->view('emails.contact'); // Vue à utiliser pour le contenu de l'email
    }
}