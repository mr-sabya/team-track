<?php

namespace App\Livewire\Theme;

use Carbon\Carbon;
use Livewire\Component;

class InfoCard extends Component
{
    public $title, $model, $icon, $className, $companyId;

    public $totalExpiringSoon;  // Total expiring within 7 days
    public $totalExpired;       // Total expired records

    public function mount($title, $model, $className, $icon, $companyId = null)
    {
        $this->title = $title;
        $this->className = $className;
        $this->icon = $icon;

        // Validate that the model exists and is valid
        if (!class_exists("App\\Models\\$model")) {
            abort(404, "Model not found.");
        }

        // Dynamically set the model
        $this->model = "App\\Models\\$model";

        // Perform calculations
        $now = Carbon::now();
        $expiringSoonThreshold = $now->copy()->addDays(7);

        if ($companyId) {
            $this->companyId = $companyId;
            // Query visas filtered by company_id through the User relationship
            $this->totalExpiringSoon = $this->model::whereHas('user', function ($query) {
                $query->where('company_id', $this->companyId);
            })->whereBetween('expiry_date', [$now, $expiringSoonThreshold])->count();

            $this->totalExpired = $this->model::whereHas('user', function ($query) {
                $query->where('company_id', $this->companyId);
            })->where('expiry_date', '<', $now)->count();
        } else {
            // Use dynamic model class for querying
            $this->totalExpiringSoon = $this->model::whereBetween('expiry_date', [$now, $expiringSoonThreshold])->count();
            $this->totalExpired = $this->model::where('expiry_date', '<', $now)->count();
        }
    }


    public function render()
    {
        return view('livewire.theme.info-card');
    }
}
