<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $is_superadmin = false;
    public $password = '';
    public $confirm_password = '';


    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|unique:users,phone',
        'password' => 'required|min:6|same:confirm_password',
    ];

    public function submit()
    {
        $this->validate();

        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_superadmin' => $this->is_superadmin,
            'is_admin' => true,
            'password' => Hash::make($this->password),
        ]);

        $this->dispatch('userCreated');

        session()->flash('message', 'User added successfully!');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
