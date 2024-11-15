<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewResultNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $result;

    /**
     * Create a new notification instance.
     */
    public function __construct($result)
    {
        $this->result = $result;
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

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Exam Result is Available!')
            ->greeting('Hello ' . $notifiable->firstName . ', a new result is now available!')
            ->line('Result for Exam: ' . $this->result['name'] . ' - ' . Carbon::parse($this->result['release_date'])->format('d-m-Y'))
            ->action('View Result', url('/results/' . $this->result['id']))
            ->line('Thank you for using our application!');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            // Any additional array data representation for the result notification
        ];
    }
}
