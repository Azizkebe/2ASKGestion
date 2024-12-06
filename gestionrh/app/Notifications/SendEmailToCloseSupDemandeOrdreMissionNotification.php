<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToCloseSupDemandeOrdreMissionNotification extends Notification
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
        ->subject('Information sur la demande de vehicule')
            ->line('Bonjour '.$this->messages['prenom'].' '. $this->messages['nom'])
            ->line('Nous vous informons que votre superieur vient de repondre à la demande d\'ordre de mission ')
            ->line('Merci de consulter le statut de la demande');
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
