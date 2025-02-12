<?php

namespace App\Livewire\Component\Notification;

use App\Models\Setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{
    public $setting;
    public $email;
    public $notification_type;
    public $notification_frequency;
    public $is_enabled;
    public $notify_on_new_message;
    public $notify_on_comment;
    public $notify_on_system_alert;
    public $days; // Add the 'days' property

    public function mount()
    {
        // Retrieve the user's settings using the relationship
        $this->setting = auth()->user()->setting;

        // If no settings are found, create the default settings
        if (!$this->setting) {
            $this->setting = Setting::create([
                'user_id' => auth()->id(),
                'email' => auth()->user()->email,  // Default to the user's email
                'is_mail_notification' => true,
                'notification_type' => 'email',  // Default notification type
                'notification_frequency' => 'weekly',  // Default notification frequency
                'is_enabled' => true,  // Enable notifications by default
                'notify_on_new_message' => true,
                'notify_on_comment' => true,
                'notify_on_system_alert' => true,
                'days' => 7,  // Default to 7 days before expiry
            ]);
        }

        // Populate the fields from the settings
        $this->email = $this->setting->email;
        $this->notification_type = $this->setting->notification_type;
        $this->notification_frequency = $this->setting->notification_frequency;
        $this->is_enabled = $this->setting->is_enabled;
        $this->notify_on_new_message = $this->setting->notify_on_new_message;
        $this->notify_on_comment = $this->setting->notify_on_comment;
        $this->notify_on_system_alert = $this->setting->notify_on_system_alert;
        $this->days = $this->setting->days;  // Bind the days field
    }

    public function updateSettings()
    {
        // Validate the input data, including the 'days' field
        $this->validate([
            'email' => 'required|email|unique:settings,email,' . $this->setting->id,
            'notification_type' => 'required',
            'notification_frequency' => 'required',
            'days' => 'required|integer|min:1',  // Validate 'days' as an integer and ensure it's at least 1
        ]);

        // Update the settings
        $this->setting->update([
            'email' => $this->email,
            'notification_type' => $this->notification_type,
            'notification_frequency' => $this->notification_frequency,
            'is_enabled' => $this->is_enabled,
            'notify_on_new_message' => $this->notify_on_new_message,
            'notify_on_comment' => $this->notify_on_comment,
            'notify_on_system_alert' => $this->notify_on_system_alert,
            'days' => $this->days,  // Update the 'days' setting
        ]);

        // Dispatch a success alert
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Settings updated successfully!',
        ]);
    }

    public function render()
    {
        return view('livewire.component.notification.setting');
    }
}
