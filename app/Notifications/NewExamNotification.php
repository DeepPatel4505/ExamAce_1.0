<?php

namespace App\Notifications;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewExamNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $exam;
    
    /**
     * Create a new notification instance.
     */
    public function __construct($exam)
    {
        $this->exam = $exam;
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
            ->subject('New Exam Released!')
            ->greeting('Hello ' . $notifiable->firstName . ', a new exam has been released!')
            ->line('Exam: ' . $this->exam['name'] . ' - ' . Carbon::parse($this->result['exam_date'])->format('d-m-Y'))
            ->action('View Exam Details', url('/exams/' . $this->exam['id']))
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
            // Any additional array data representation for the exam notification
        ];
    }
}
