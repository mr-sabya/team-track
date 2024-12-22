<?php

namespace App\Livewire\Admin\User;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $is_superadmin = false;
    public $password = '';
    public $confirm_password = '';
    public $roles = [];
    public $role = null;
    public $company_id;
    public $forCompany = false;


    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|unique:users,phone',
        'password' => 'required|min:6|same:confirm_password',
        'role' => 'nullable|exists:roles,name',
    ];

    // Method to toggle the state
    public function toggleForCompany()
    {
        // dd($this->forCompany);
        if ($this->forCompany == true) {
            $this->forCompany = true;
        }
    }


    public function mount()
    {
        $this->roles = Role::pluck('name')->toArray(); // Get all role names
    }

    public function submit()
    {

        $this->validate();


        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;

        if ($this->is_superadmin == true) {
            $user->is_superadmin = 1;
        } else {
            $user->is_superadmin = 0;
        }

        if ($this->forCompany) {
            $user->is_company = 1;
            $user->company_id = $this->company_id;
        } else {
            $user->is_admin = 1;
        }


        $user->password = Hash::make($this->password);

        // Save the user to the database
        $user->save();


        if ($this->role) {
            $user->assignRole($this->role);
        }

        $this->forCompany = false;
        $this->roles = Role::pluck('name')->toArray();


        $this->dispatch('userCreated');

        $this->dispatch('alert', ['type' => 'success',  'message' => 'User has been created successfully!']);
        $this->reset();
    }


    public function render()
    {
        return view('livewire.admin.user.create', [
            'roles' => $this->roles,
            'companies' => Company::orderBy('id', 'ASC')->get(),
        ]);
    }
}
