<?php

namespace App\Livewire\Company\Plan;

use App\Models\Plan;
use App\Models\User;
use App\Notifications\ApplyPlanNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Apply extends Component
{
    public $plan;
    public $company;
    public $monthlyPrice;
    public $yearlyPrice;
    public $selectedType;

    public function mount($planId)
    {
        $this->company = Auth::user()->company;
        $this->plan = Plan::findOrFail($planId);

        // Assume the plan model has a base price
        $this->monthlyPrice = $this->plan->price;
        $this->yearlyPrice = $this->plan->price * 12; // 10% discount for yearly

        // Check current subscription type
        $this->selectedType = $this->company->subscription_plan_id == $planId
            ? $this->company->subscription_type
            : 'monthly';
    }

    public function applyPlan($type)
    {
        if (!in_array($type, ['monthly', 'yearly'])) {
            return;
        }

        $this->company->update([
            'subscription_plan_id' => $this->plan->id,
            'subscription_type' => $type,
            'subscription_status' => 'pending',
            'subscription_applied_at' => now(),
        ]);

        // Send Notification to Super Admins
        $superAdmins = User::where('is_superadmin', 1)->get();
        Notification::send($superAdmins, new ApplyPlanNotification(
            "{$this->company->name} has subscribed to the {$this->plan->name} plan ({$type})."
        ));


        $this->selectedType = $type;
        // session()->flash('message', 'Plan updated successfully.');
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Plan request has been sent successfully!']);
    }

    public function render()
    {
        return view('livewire.company.plan.apply');
    }
}
