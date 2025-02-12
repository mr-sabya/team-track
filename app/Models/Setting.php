<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_mail_notification',
        'email',
        'days',
        'notification_type',
        'notification_frequency',
        'is_enabled',
        'last_notified_at',
        'notify_on_new_message',
        'notify_on_comment',
        'notify_on_system_alert',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optionally, you can define accessors for easier use of default values
    public function getIsMailNotificationAttribute($value)
    {
        return (bool) $value;
    }

    public function getDaysAttribute($value)
    {
        return $value ?? 7; // default to 7 days if null
    }
}
