<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToEmployeAfterAcceptedDemandeNotification extends Notification
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
        ->subject('Information de retour de votre superieur suite à votre demande')
        ->line('Bonjour '.$this->messages['prenom'].' '. $this->messages['nom'].',')
        ->line('Vous avez une nouvelle notification suite à votre demande de permission de '.$this->messages['nbr_jour']. ' jour(s)')
        ->line('En cas d\'acceptation de la demande, il faudra attendre le retour du RH')
        ->line('Veuillez consulter la plateforme, Merci !!!');
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
