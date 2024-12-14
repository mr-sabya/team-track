<?php

namespace App\Livewire\Employee\Home;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $employeeId, $employee;

    public function mount($id)
    {
        $this->employeeId = $id;
        $this->employee = User::find($this->employeeId);
    }

    
    public function render()
    {
        return view('livewire.employee.home.index');
    }
}
