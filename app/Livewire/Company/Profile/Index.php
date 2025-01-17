<?php

namespace App\Livewire\Company\Profile;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public $company;

    public function mount($companyId)
    {
        $this->company = Company::find($companyId);

    }

    public function render()
    {
        return view('livewire.company.profile.index');
    }
}
