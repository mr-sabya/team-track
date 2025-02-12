<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DrivingLicenseExpiryNotification extends Notification
{
    use Queueable;

    protected $expiryDate;

    public function __construct($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Driving License Expiry Alert')
            ->line("Your driving license is expiring on {$this->expiryDate}. Please take the necessary actions.")
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification for the database.
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => "Your driving license is expiring on {$this->expiryDate}.",
            'expiry_date' => $this->expiryDate,
        ];
    }
}
