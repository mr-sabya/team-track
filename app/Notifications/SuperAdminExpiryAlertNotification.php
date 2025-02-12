<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuperAdminExpiryAlertNotification extends Notification
{
    use Queueable;

    protected $expiringRecords;

    public function __construct($expiringRecords)
    {
        $this->expiringRecords = $expiringRecords;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['database'];  // Only via database for Super Admin
    }

    /**
     * Get the array representation of the notification for the database.
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'The following records are expiring soon:',
            'expiring_records' => $this->expiringRecords,  // Detailed info about the records
        ];
    }
}
