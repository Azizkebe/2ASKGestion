<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToEmployeAfterAcceptedCongeNotification extends Notification
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

        ->subject('Modification de Congé')
        ->line('Bonjour '.$this->messages['prenom'].' '. $this->messages['nom'])
        ->line('Suite à votre demande de Permission, le Service des Ressources Humaines de l\'Anpej')
        ->line('Vous informe que votre permission a été modifiée. Elle demarre à la date du '.$this->messages['todate'].' à 17h')
        ->line('Et prendra fin le soir de la date du '. $this->messages['fordate']. ' à 17h')
        ->line('Pour une duree de '. $this->messages['nbr_jour'].' jours')
        ->line('Nombre de Jour de congé restant est de : '. $this->messages['permission']. ' jour(s)');
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
