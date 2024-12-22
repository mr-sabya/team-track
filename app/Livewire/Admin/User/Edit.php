<?php

namespace App\Livewire\Admin\User;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $userId, $user, $title;
    public $first_name, $last_name, $email, $phone, $password, $confirm_password, $role, $is_superadmin;
    public $roles;
    public $company_id;
    public $forCompany = false;

    public function mount($userId, $title)
    {
        $this->userId = $userId;
        $this->title = $title;

        $this->user = User::findOrFail($this->userId);
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->role = $this->user->roles->first()->name ?? ''; // Assuming the user has one role
        $this->is_superadmin = $this->user->is_superadmin;

        if ($this->user->is_company == 1) {
            $this->forCompany = true;
            $this->company_id = $this->user->company_id;
        }

        // Load roles for the dropdown
        $this->roles = Role::pluck('name')->toArray();
    }


    // Method to toggle the state
    public function toggleForCompany()
    {
        // dd($this->forCompany);
        if ($this->forCompany == true) {
            $this->forCompany = true;
        }
    }

    public function submit()
    {
        // Set rules dynamically
        $rules = $this->getValidationRules();

        // Validate the form data
        $this->validate($rules);


        $user = User::findOrFail($this->userId);
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
            $user->is_admin = 0;
            $user->is_company = 1;
            $user->company_id = $this->company_id;
        } else {
            $user->is_admin = 1;
            $user->company_id =  null;
            $user->is_company = 0;
        }


        $user->password = Hash::make($this->password);

        // Save the user to the database
        $user->save();

        if($this->forCompany){
            $user->syncRoles([]);
        }else{
            $user->syncRoles([$this->role]);
        }

        // Sync role

        $this->dispatch('alert', ['type' => 'success',  'message' => 'User has been created successfully!']);

        // Redirect or reset fields
        return $this->redirect(route('user.index'), navigate: true);
    }

    public function getValidationRules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->userId)],
            'phone' => ['required', 'string', 'max:15', Rule::unique('users', 'phone')->ignore($this->userId)],
            'role' => 'required|exists:roles,name',
            'is_superadmin' => 'nullable|boolean',
        ];
    }

    // change password
    public function changePassword()
    {
        // Validate only password fields
        $this->validate([
            'password' => 'nullable|confirmed|min:6',  // Validate password only if it's provided
            'confirm_password' => 'nullable',
        ]);

        $user = User::findOrFail($this->userId);

        // Update password if provided
        if ($this->password) {
            $user->update(['password' => Hash::make($this->password)]);
        }

        $this->dispatch('alert', ['type' => 'success',  'message' => 'User has been created successfully!']);

        // Redirect or reset fields
        return $this->redirect(route('user.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.user.edit', [
            'roles' => $this->roles,
            'companies' => Company::orderBy('id', 'ASC')->get(),
        ]);
    }
}
