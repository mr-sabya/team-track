<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\SuperAdminExpiryAlertNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifySuperAdminAboutExpiringRecords implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Collect all expiring records within the next 7 days for each category
        $expiringVisas = User::with('visa')->whereHas('visa', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        $expiringPassports = User::with('passport')->whereHas('passport', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        $expiringVehicles = User::with('vehicle')->whereHas('vehicle', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        $expiringDrivingLicenses = User::with('drivingLicense')->whereHas('drivingLicense', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        $expiringEmiratesIDs = User::with('emiratesInfo')->whereHas('emiratesInfo', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        $expiringInsurance = User::with('insuranceInfo')->whereHas('insuranceInfo', function ($query) {
            $query->where('expiry_date', '<=', now()->addDays(7));
        })->get();

        // Consolidate the data
        $expiringRecords = [
            'visas' => $expiringVisas,
            'passports' => $expiringPassports,
            'vehicles' => $expiringVehicles,
            'driving_licenses' => $expiringDrivingLicenses,
            'emirates_ids' => $expiringEmiratesIDs,
            'insurance' => $expiringInsurance,
        ];

        // Find all super admins
        $superAdmins = User::where('is_superadmin', 1)->get(); // Fetch all users who are super admins

        // Send the notification to each super admin
        foreach ($superAdmins as $superAdmin) {
            $superAdmin->notify(new SuperAdminExpiryAlertNotification($expiringRecords));
        }
    }
}
