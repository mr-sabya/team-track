<?php

namespace App\Livewire\Company\Employee;

use Livewire\Component;

class Menu extends Component
{
    public $employee_id;

    public function mount($id)
    {
        $this->employee_id = $id;
    }
    
    public function render()
    {
        return view('livewire.company.employee.menu');
    }
}
