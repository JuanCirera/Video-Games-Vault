<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotify extends Notification
{
    use Queueable;

    public string $email, $content;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $email, string $content)
    {
        $this->email=$email;
        $this->content=$content;
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
                    ->greeting('Nuevo contacto')
                    ->line('El usuario '.$this->email.' ha enviado el siguiente mensaje: ')
                    ->line($this->content)
                    ->salutation(" ");
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
