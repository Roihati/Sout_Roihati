<?php namespace App\Mail;

 use App\Mail\ContactMail;
use Illuminate\Bus\Queueable;
   use Illuminate\Mail\Mailable;
   use Illuminate\Queue\SerializesModels;

   class ContactMail extends Mailable
   {
       use Queueable, SerializesModels;

       public $details;
       
       public function __construct($details)
       {
           $this->details = $details;
       }
       public function build()
       {
           return $this->subject('New Contact Message')
                       ->markdown('emails.contact')
                       ->with('$details',$this->details);
       }
Mail::to('roihatibinti@gmail.com')->send(new App\Mail\ContactMail(['name' => 'Roihati', 'email' => 'roihatibinti@gmail.com', 'message']));