<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToAfterTransfertDemandeOrdreMissionNotification extends Notification
{
    use Queueable;
    public $messages_sup_resp;
    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->messages_sup_resp = $message;
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
            ->subject('Avis de demande de carburant')
            ->line('Bonjour '.$this->messages_sup_resp['prenom'].' '. $this->messages_sup_resp['nom'])
            ->line('Vous avez une nouvelle demande de carburant pour validation')
            ->line('Veuillez vous connecter sur la plateforme');
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