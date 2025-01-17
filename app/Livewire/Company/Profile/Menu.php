<?php

namespace App\Livewire\Company\Profile;

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
        return view('livewire.company.profile.menu');
    }
}
