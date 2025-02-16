<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplyPlanNotification extends Notification
{
    use Queueable;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Send via email and store in the database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Plan Subscription')
                    ->line($this->message)
                    ->action('View Dashboard', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }
}
