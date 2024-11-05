<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Abonnement;

class AbonnementCreated extends Notification
{
    use Queueable;

    protected $abonnement;

    public function __construct(Abonnement $abonnement)
    {
        $this->abonnement = $abonnement;

    /**
     * Create a new notification instance.
     * 
     */
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->greeting('Bonjour!')
        ->line('Un nouvel abonnement a été créé.')
        ->line('Fournisseur: ' . $this->abonnement->nom_fournisseur)
        ->line('Prix: €' . $this->abonnement->prix)
        ->line('Durée: ' . $this->abonnement->durée . ' mois')
        ->action('Voir le tableau de bord', url('/dashboard'))
        ->line('Merci d\'utiliser notre application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
