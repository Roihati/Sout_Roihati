<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Products;

class StockAlertNotification extends Notification
{
    use Queueable;
public $product;
    /**
     * Create a new notification instance.
     */
    public function __construct(Products $product)
    {
        $this->product = $product;
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
    

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Alerte de Réapprovisionnement')
                    ->line("Le produit {$this->product->name} a atteint son seuil de réapprovisionnement.")
                    ->line("Quantité disponible : {$this->product->quantite_disponible}")
                    ->action('Voir le produit', url('/fournisseur/products/' . $this->product->id))
                    ->line('Veuillez réapprovisionner ce produit dès que possible.');
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
