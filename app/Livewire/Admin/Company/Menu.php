<?php

namespace App\Livewire\Admin\Company;

use Livewire\Component;

class Menu extends Component
{
    public $companyId;

    public function mount($companyId)
    {
        $this->companyId = $companyId;
    }

    
    public function render()
    {
        return view('livewire.admin.company.menu');
    }
}
