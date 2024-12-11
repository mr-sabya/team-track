<?php

namespace App\Livewire\Admin\Employee;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public $employee;
    public $company_id = '';
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $address = '';
    public $date_of_birth = '';
    public $is_superadmin = false;
    public $password = '';
    public $confirm_password = '';


    protected $rules = [
        'company_id' => 'required',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'address' => 'required|string|max:255',
        'date_of_birth' => 'required',
        'password' => 'required|min:6|same:confirm_password',
    ];


    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->company_id = $this->employee->company_id;
    }

    public function submit()
    {
        $this->validate();
        // dd($this->company_id);
        try {
            $user = User::create([
                'company_id' => $this->company_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'address' => $this->address,
                'date_of_birth' => $this->date_of_birth,
                'is_employee' => 1,
                'password' => Hash::make($this->password),
            ]);


            $this->dispatch('alert', ['type' => 'success',  'message' => 'Employee has been created successfully!']);

            return $this->redirect(route('employee.index'), navigate: true);
        } catch (\Exception $e) {
            $this->dispatch('alert', ['type' => 'error',  'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    
    public function render()
    {
        return view('livewire.admin.employee.edit', [
            'companies' => Company::orderBy('name', 'ASC')->get(),
        ]);
    }
}
