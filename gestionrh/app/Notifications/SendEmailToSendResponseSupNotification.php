<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToSendResponseSupNotification extends Notification
{
    use Queueable;
    public $messages_resp;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->messages_resp = $message;
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
        ->subject('Avis de demande de traitement')
        ->line('Bonjour '.$this->messages_resp['prenom'].' '. $this->messages_resp['nom'])
        ->line('Vous avez une nouvelle de demande de vehicule à traiter')
        ->line('Merci de vous connecter sur la plateforme');
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
