<?php

namespace App\Livewire\Employee\Home;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeProfileImage extends Component
{

    use WithFileUploads;

    public $image;
    public $employee;

    public function mount($employeeId)
    {
        $this->employee = User::findOrFail($employeeId);
    }

    public function updateProfilePicture()
    {
        $this->validate([
            'image' => 'image|max:1024', // Validate the uploaded file (e.g., max 1MB)
        ]);

        $path = $this->image->store('profile_images', 'public');
        $this->employee->update(['image' => $path]);

        // Dispatch success message
        session()->flash('message', 'Profile picture updated successfully.');

        // Emit event to close the modal
        $this->dispatchBrowserEvent('close-modal');
    }

    
    public function render()
    {
        return view('livewire.employee.home.change-profile-image');
    }
}
