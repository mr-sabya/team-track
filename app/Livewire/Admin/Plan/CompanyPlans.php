<?php

namespace App\Livewire\Admin\Plan;

use App\Models\Company;
use Livewire\Component;

class CompanyPlans extends Component
{
    public $companies, $recentApplications;

    public function mount()
    {
        // Get all companies with subscription details
        $this->companies = Company::with('subscriptionPlan')
            ->orderByDesc('subscription_applied_at')
            ->get()
            ->map(function ($company) {
                $company->subscription_applied_at = \Carbon\Carbon::parse($company->subscription_applied_at);
                return $company;
            });


        // Get only recent applied plans
        $this->recentApplications = Company::with('subscriptionPlan')
            ->whereNotNull('subscription_applied_at')
            ->orderByDesc('subscription_applied_at')
            ->take(5)
            ->get();
    }

    public function updateStatus($companyId, $status)
    {
        $company = Company::find($companyId);

        if ($company) {
            $company->update([
                'subscription_status' => $status,
            ]);

            session()->flash('message', 'Subscription status updated successfully.');
        }
    }


    public function render()
    {
        return view('livewire.admin.plan.company-plans');
    }
}
