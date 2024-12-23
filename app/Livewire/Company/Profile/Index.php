<?php

namespace App\Livewire\Company\Profile;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $trade_license;
    public $establishment_card;
    public $vehicle;
    public $domain_subscriptions;
    public $tenancy_agreement;
    public $electricity_bills;
    public $wifi_bills;
    public $sewerage_bills;
    public $mobile_bills;
    public $company;

    public function mount($companyId)
    {
        $this->company = Company::find($companyId);

        if ($this->company) {
            $this->name = $this->company->name;
            $this->trade_license = $this->company->trade_license;
            $this->establishment_card = $this->company->establishment_card;
            $this->vehicle = $this->company->vehicle;
            $this->domain_subscriptions = $this->company->domain_subscriptions;
            $this->tenancy_agreement = $this->company->tenancy_agreement;
            $this->electricity_bills = $this->company->electricity_bills;
            $this->wifi_bills = $this->company->wifi_bills;
            $this->sewerage_bills = $this->company->sewerage_bills;
            $this->mobile_bills = $this->company->mobile_bills;
        }
    }


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

        $this->company->update([
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
        ]);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Company has been updated successfully!']);
    }

    public function render()
    {
        return view('livewire.company.profile.index');
    }
}
