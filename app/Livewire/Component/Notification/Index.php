<?php

namespace App\Livewire\Component\Notification;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $perPage = 10;

    public function markAsRead($notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Notification marked as read.',
            ]);
        }
    }

    public function deleteNotification($notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);

        if ($notification) {
            $notification->delete();
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Notification deleted successfully.',
            ]);
        }
    }

    public function deleteAllNotifications()
    {
        auth()->user()->notifications()->delete();

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'All notifications deleted successfully.',
        ]);
    }

    public function render()
    {
        $notifications = Auth::user()
            ->notifications()
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.component.notification.index', compact('notifications'));
    }
}
