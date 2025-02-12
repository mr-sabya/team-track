<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\VehicleExpiryNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyExpiringVehicles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle()
    {
        $users = User::with('vehicle')->whereHas('vehicle', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        foreach ($users as $user) {
            $user->notify(new VehicleExpiryNotification($user->vehicle->expiry_date));
        }
    }
}
