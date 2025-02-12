<?php

namespace App\Console;

use App\Jobs\NotifyExpiringDrivingLicenses;
use App\Jobs\NotifyExpiringEmiratesIDs;
use App\Jobs\NotifyExpiringInsuranceInfo;
use App\Jobs\NotifyExpiringPassports;
use App\Jobs\NotifyExpiringVehicles;
use App\Jobs\NotifyExpiringVisas;
use App\Jobs\NotifySuperAdminAboutExpiringRecords;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new NotifyExpiringVisas())->daily();
        $schedule->job(new NotifyExpiringPassports())->daily();
        $schedule->job(new NotifyExpiringVehicles())->daily();
        $schedule->job(new NotifyExpiringDrivingLicenses())->daily();
        $schedule->job(new NotifyExpiringEmiratesIDs())->daily();
        $schedule->job(new NotifyExpiringInsuranceInfo())->daily();

        // for all
        $schedule->job(new NotifySuperAdminAboutExpiringRecords())->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
