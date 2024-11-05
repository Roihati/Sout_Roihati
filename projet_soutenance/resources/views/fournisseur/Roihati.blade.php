use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AbonnementCreated extends Notification
{
    use Queueable;

    protected $abonnement;

    public function __construct(Abonnement $abonnement)
    {
        $this->abonnement = $abonnement;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
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
}