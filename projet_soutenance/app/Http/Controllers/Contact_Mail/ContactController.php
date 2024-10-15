<?php

namespace App\Http\Controllers\Contact_Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    
    
    public function show()
    { 
        $details = [
            'firstname' => '',
            'lastname' => '',
            'email' => '',
            'phone' => '',
            'message' => '',
        ];
        return view('emails.contact', compact('details'));
    }
    public function submit(Request $request)
    {
       
       dd($request->all());
       
        $details = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];

        Mail::to('roihatibinti@gmail.com');

        return back()->with('success', 'Email sent successfully!');


    } 


    /*
    $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',

            dd($request->all());
            // Validation des données du formulaire
            $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'message' => 'required|string|max:1000',
            ]);
    

        $details = [
            'firstname' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Mail::to('roihatibinti@gmail.com')->send(new \App\Mail\ContactMail($details));
        return back()->with('success', 'Thank you for your message. We will get back to you soon.');*/
    }


