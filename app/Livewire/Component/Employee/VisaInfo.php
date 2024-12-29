<?php

namespace App\Livewire\Component\Employee;

use App\Models\User;
use App\Models\Visa;
use Livewire\Component;
use Livewire\WithFileUploads;

class VisaInfo extends Component
{
    use WithFileUploads;

    public $employee, $visa_info, $issue_date, $expiry_date, $image;
    public $existingImage;

    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->visa_info = Visa::where('id', $this->employee->visa['id'])->first();
        // dd($visa_info);
        $this->issue_date = $this->visa_info->issue_date;
        $this->expiry_date = $this->visa_info->expiry_date;
        $this->existingImage = $this->visa_info->image;
    }

    public function handleChange()
    {
        $this->existingImage = null;
    }

    public function clearImage()
    {
        if ($this->visa_info != null) {
            $this->existingImage = $this->visa_info->image;
        }
        $this->image = null;
    }


    public function submit()
    {
        $this->validate([
            'issue_date' => 'required',
            'expiry_date' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        // dd($this->image);

        $visa_info = Visa::where('id', $this->employee->visa['id'])->first();
        $visa_info->issue_date = $this->issue_date;
        $visa_info->expiry_date = $this->expiry_date;
        // Use the helper to upload the image
        if ($this->image) {
            $visa_info->image = uploadImage($this->image, 'employee/visa', $visa_info->image);
        }
        $visa_info->save();


        sleep(2); // Simulating a delay
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Visa Info has been updates successfully!']);
    }

    public function render()
    {
        return view('livewire.component.employee.visa-info');
    }
}
