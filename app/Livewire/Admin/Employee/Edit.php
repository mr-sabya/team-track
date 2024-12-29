<?php

namespace App\Livewire\Admin\Employee;

use App\Models\Company;
use App\Models\Country;
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
    public $phone = '';
    public $address = '';
    public $date_of_birth = '';
    public $gender = '';
    public $country_id = '';


    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->company_id = $this->employee->company_id;
        $this->first_name = $this->employee->first_name;
        $this->last_name = $this->employee->last_name;
        $this->email = $this->employee->email;
        $this->phone = $this->employee->phone;
        $this->address = $this->employee->address;
        $this->date_of_birth = $this->employee->date_of_birth;
        $this->gender = $this->employee->gender;
        $this->country_id = $this->employee->country_id;
    }

    public function submit()
    {
        $employee = User::find($this->employee->id);

        $this->validate([
            'company_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->id,
            'phone' => 'nullable|unique:users,phone,' . $employee->id,
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'country_id' => 'nullable',

        ]);
        // dd($this->company_id);
        try {
            $employee->update([
                'company_id' => $this->company_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'date_of_birth' => $this->date_of_birth,
                'gender' => $this->gender,
                'address' => $this->address,
                'country_id' => $this->country_id,
            ]);


            $this->dispatch('alert', ['type' => 'success',  'message' => 'Employee has been created successfully!']);

            // return $this->redirect(route('employee.index'), navigate: true);
        } catch (\Exception $e) {
            $this->dispatch('alert', ['type' => 'error',  'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


    public function render()
    {
        return view('livewire.admin.employee.edit', [
            'companies' => Company::orderBy('name', 'ASC')->get(),
            'countries' => Country::orderBy('name', 'ASC')->get(),
        ]);
    }
}
