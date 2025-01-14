<?php

namespace App\Livewire\Component\Company;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BasicInfo extends Component
{
    use WithFileUploads;

    public $companyId;
    public $name, $email, $phone, $address, $salution;
    public $currentLogo, $newLogo;

    public function mount($companyId)
    {
        $company = Company::findOrFail($companyId);

        $this->companyId = $company->id;
        $this->name = $company->name;
        $this->email = $company->email;
        $this->phone = $company->phone;
        $this->address = $company->address;
        $this->salution = $company->salution;
        $this->currentLogo = $company->logo;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'salution' => 'nullable|string|max:255',
            'newLogo' => 'nullable|image|max:1024', // max size 1MB
        ]);

        $company = Company::findOrFail($this->companyId);
        $company->name = $this->name;
        $company->email = $this->email;
        $company->phone = $this->phone;
        $company->address = $this->address;
        $company->salution = $this->salution;

        if ($this->newLogo) {
            // Delete old logo if exists
            if ($company->logo && Storage::exists($company->logo)) {
                Storage::delete($company->logo);
            }

            // Upload new logo
            $path = $this->newLogo->store('logos', 'public');
            $company->logo = $path;
        }

        $company->save();
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Company has been updated successfully!']);
    }

    public function resetLogo()
    {
        $this->newLogo = null;
    }

    public function render()
    {
        return view('livewire.component.company.basic-info');
    }
}
