<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateNotify extends Notification
{
    use Queueable;

    public string $gameTitle, $gameSlug;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $gameTitle, string $gameSlug)
    {
        $this->gameTitle=$gameTitle;
        $this->gameSlug=$gameSlug;
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
                    ->greeting('¡Uno de tus juegos tiene novedades!')
                    ->line($this->gameTitle.' se ha actualizado recientemente, entra para ver cuales son las novedades.')
                    ->action('Ver detalles', url('/games/'.$this->gameSlug));
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
