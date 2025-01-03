<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToAdminAfterRegistration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $email;
    public function __construct($emailtosend)
    {
        $this->email = $emailtosend;
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
                ->line('Bonjour,')
                ->line('Bienvenue sur la plateforme DIiso-ANPEJ,')
                ->line('Votre compte a été crée avec success')
                ->line('cliquez sur le bouton ci dessous pour valider le compte')
                ->action('Cliquez ici', url('/validate-account' . '/'. $this->email))
                ->line('Merci !');
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
