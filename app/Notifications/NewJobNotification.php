<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJobNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $job;
    /**
     * Create a new notification instance.
     */
    public function __construct($job)
    {
        $this->job = $job;
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
    // In NewJobNotification.php
    public function toMail($notifiable)
    {
        // Now, using $notifiable (which is each user) directly
        return (new MailMessage)
            ->subject('New Job Out!!')
            ->greeting('Hey ' . $notifiable->firstName . ', a new job opportunity!!')
            ->line($this->job['title'] . ' - ' . $this->job['location'])
            ->action('View Job Details', url('/jobs/' . $this->job['id']))
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
            //
        ];
    }
}
