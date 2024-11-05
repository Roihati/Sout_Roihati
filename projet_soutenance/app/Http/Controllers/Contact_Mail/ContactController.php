<?php

namespace App\Http\Controllers\Contact_Mail;

use Illuminate\Http\Request;
use App\Mail\ContactMail; 
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{


    public function show()
    {
        // Initialiser $details avec des valeurs par défaut
        $details = [
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'phone' => '',
            'message' => '',
        ];

        return view('contact', compact('details')); // Passer $details à la vue
    }
    public function submit(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Récupération des données validées
        $details = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];

        # Envoi de l'email
        Mail::to('roihatibinti@gmail.com')->send(new ContactMail($details));

        return back()->with('success', 'Merci pour votre message. Nous vous répondrons bientôt.');
    }
}