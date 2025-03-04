<?php

namespace App\Livewire\Component\Company;

use App\Models\Company;
use Livewire\Component;

class Create extends Component
{
    public $name, $trade_license, $establishment_card, $vehicle, $domain_subscriptions, $tenancy_agreement,
        $electricity_bills, $wifi_bills, $sewerage_bills, $mobile_bills;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'trade_license' => 'nullable|string|max:255',
            'establishment_card' => 'nullable|string|max:255',
            'vehicle' => 'nullable|string|max:255',
            'domain_subscriptions' => 'nullable|string|max:255',
            'tenancy_agreement' => 'nullable|string|max:255',
            'electricity_bills' => 'nullable|string|max:255',
            'wifi_bills' => 'nullable|string|max:255',
            'sewerage_bills' => 'nullable|string|max:255',
            'mobile_bills' => 'nullable|string|max:255',
        ]);
        try {
            Company::create([
                'name' => $this->name,
                'trade_license' => $this->trade_license,
                'establishment_card' => $this->establishment_card,
                'vehicle' => $this->vehicle,
                'domain_subscriptions' => $this->domain_subscriptions,
                'tenancy_agreement' => $this->tenancy_agreement,
                'electricity_bills' => $this->electricity_bills,
                'wifi_bills' => $this->wifi_bills,
                'sewerage_bills' => $this->sewerage_bills,
                'mobile_bills' => $this->mobile_bills,
                'subscription_plan_id' => 1,
                'subscription_type' => 'yearly',
                'subscription_status' => 'active',
                'subscription_applied_at' => now(),
            ]);

            $this->dispatch('alert', ['type' => 'success',  'message' => 'Company has been created successfully!']);
            return $this->redirect(route('company.index'), navigate: true);
        } catch (\Exception $e) {
            $this->dispatch('alert', ['type' => 'error',  'message' => 'Something went wrong!']);
        }
    }

    public function render()
    {
        return view('livewire.component.company.create');
    }
}
