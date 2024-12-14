<?php

namespace App\Livewire\Employee\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $user, $userId;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ];

    public function mount($id)
    {
        $this->userId = $id;    
    }

    public function updatePassword()
    {
        $this->validate();

        // Check if the current password is correct
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }
        
        $user = User::find($this->userId);
        // Update the password
        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        // Clear the fields and notify the user
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Your password has been updated successfully!']);
    }

    public function render()
    {
        return view('livewire.employee.profile.password');
    }
}
