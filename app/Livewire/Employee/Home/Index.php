<?php

namespace App\Livewire\Employee\Home;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $image;
    public $employee;
    public $employeeId;
    public $showForm = false; // Flag to control form visibility

    public function mount($employeeId)
    {
        $this->employeeId = $employeeId;
        $this->employee = User::findOrFail($this->employeeId);
    }

    public function updateProfilePicture()
    {
        // Validate the image upload
        $this->validate([
            'image' => 'image|max:1024', // Validate the uploaded file (max 1MB)
        ]);

        // Handle the image upload using your custom uploadImage function
        $employee = User::findOrFail($this->employeeId);
        $path = uploadImage($this->image, 'employee/profile', $this->employee->image);

        // Update the employee's image in the database
        $employee->update(['image' => $path]);

        // Dispatch a success message
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Profile picture updated successfully.']);

        // Update the employee instance to reflect the new image immediately
        $this->employee = User::findOrFail($this->employeeId);

        // Hide the form after submission
        $this->showForm = false;
    }


    public function render()
    {
        return view('livewire.employee.home.index');
    }
}
