<?php

namespace App\Livewire\Component\Employee;

use App\Models\DrivingLicense;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class DrivingInfo extends Component
{
    use WithFileUploads;

    public $employee, $driving_license, $driving_license_no, $issue_date, $expiry_date, $image;
    public $existingImage;

    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->driving_license = DrivingLicense::where('id', $this->employee->drivingLicense['id'])->first();
        // dd($visa_info);
        $this->driving_license_no = $this->driving_license->driving_license_no;
        $this->issue_date = $this->driving_license->issue_date;
        $this->expiry_date = $this->driving_license->expiry_date;
        $this->existingImage = $this->driving_license->image;
    }

    public function handleChange()
    {
        $this->existingImage = null;
    }

    public function clearImage()
    {
        if ($this->driving_license != null) {
            $this->existingImage = $this->driving_license->image;
        }
        $this->image = null;
    }


    public function submit()
    {
        $driving_license = DrivingLicense::where('id', $this->employee->drivingLicense['id'])->first();
        // dd($passport_info->id);

        if ($driving_license->driving_license_no == $this->driving_license_no) {
            $this->validate([
                'driving_license_no' => 'required',
                'issue_date' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        } else {
            $this->validate([
                'driving_license_no' => 'required|unique:driving_licenses',
                'issue_date' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        }


        // dd($this->image);

        $driving_license->driving_license_no = $this->driving_license_no;
        $driving_license->issue_date = $this->issue_date;
        $driving_license->expiry_date = $this->expiry_date;
        // Use the helper to upload the image
        if ($this->image) {
            $driving_license->image = uploadImage($this->image, 'employee/driving-license', $driving_license->image);
        }
        $driving_license->save();


        sleep(2); // Simulating a delay
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Drving License Info has been updates successfully!']);
    }

    public function render()
    {
        return view('livewire.component.employee.driving-info');
    }
}
