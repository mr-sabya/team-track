<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\VisaExpiryNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyExpiringVisas implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle()
    {
        $users = User::with('visa')->whereHas('visa', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        foreach ($users as $user) {
            $user->notify(new VisaExpiryNotification($user->visa->expiry_date));
        }
    }
}
