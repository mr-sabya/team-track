<?php

namespace App\Livewire\Component\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $current_password, $new_password, $new_password_confirmation;

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed', // Confirms with `new_password_confirmation`
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Password has been updated successfully!']);
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }
    
    public function render()
    {
        return view('livewire.component.profile.password');
    }
}
