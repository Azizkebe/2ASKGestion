<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailAfterResponseComptableNotification extends Notification
{
    use Queueable;
    public $messages;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->messages = $message;
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
        ->subject('Traitement final de la demande')
        ->line('Bonjour '.$this->messages['prenom'].' '. $this->messages['nom'])
        ->line('Suite à la validation de votre superieur, vous avez nouvelle reponse du Comptable des Matieres')
        ->line('Veuillez-vous connecter sur la plateforme');
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
