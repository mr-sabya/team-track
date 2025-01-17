<?php

namespace App\Livewire\Company\Profile;

use App\Models\Company;
use Livewire\Component;

class Info extends Component
{
    public $company;
    public $companyId;

    protected $listeners = ['companyUpdated' => 'refreshMenuItems'];


    public function refreshMenuItems()
    {
        $this->company = Company::find($this->companyId);
    }

    public function mount($companyId)
    {
        $this->companyId = $companyId;
        $this->company = Company::find($companyId);
        $this->refreshMenuItems();
    }

    public function render()
    {
        return view('livewire.company.profile.info');
    }
}
