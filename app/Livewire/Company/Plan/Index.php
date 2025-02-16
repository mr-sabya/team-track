<?php

namespace App\Livewire\Company\Plan;

use App\Models\Company;
use App\Models\Plan;
use Livewire\Component;

class Index extends Component
{
    public $companyId;
    public $company;
    public $plans;
    public $selectedPlanId;

    public function mount($companyId)
    {
        $this->companyId = $companyId;
        $this->company = Company::findOrFail($this->companyId);
        $this->plans = Plan::all();  // Fetch all plans
        $this->selectedPlanId = $this->company->subscription_plan_id; // Pre-select the current plan
    }

    // Method to select a plan
    public function selectPlan($planId)
    {
        $this->selectedPlanId = $planId;
    }

    public function subscribeToPlan()
    {
        $company = Company::findOrFail($this->companyId);

        // Ensure a plan is selected
        if ($this->selectedPlanId) {
            $company->subscription_plan_id = $this->selectedPlanId;
            $company->save();

            session()->flash('message', 'Plan subscribed successfully!');
        } else {
            session()->flash('error', 'Please select a plan.');
        }
    }

    public function render()
    {
        $currentPlan = $this->company->subscriptionPlan; // Use the subscriptionPlan relationship

        return view('livewire.company.plan.index', compact('currentPlan'));
    }
}
