<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToSuperieurAfterAcceptedDemandeNotification extends Notification
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
        ->subject('Information de retour du RH suite à votre demande')
        ->line('Bonjour '.$this->messages['user_prenom'].' '. $this->messages['user_nom'].',')
        ->line('Vous avez une nouvelle notification venant du RH suite à la validation de la demande adressée de '.$this->messages['user_nbr_jour']. ' jour(s)')
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
