<?php

namespace App\Livewire\Admin\Employee;

use App\Models\User;
use App\Models\Vehicle as ModelsVehicle;
use Livewire\Component;
use Livewire\WithFileUploads;

class Vehicle extends Component
{
    use WithFileUploads;

    public $employee, $vehicle_info, $vehicle_no, $issue_date, $expiry_date, $image;
    public $existingImage;

    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->vehicle_info = ModelsVehicle::where('id', $this->employee->vehicle['id'])->first();
        // dd($visa_info);
        $this->vehicle_no = $this->vehicle_info->vehicle_no;
        $this->issue_date = $this->vehicle_info->issue_date;
        $this->expiry_date = $this->vehicle_info->expiry_date;
        $this->existingImage = $this->vehicle_info->image;
    }

    public function handleChange()
    {
        $this->existingImage = null;
    }

    public function clearImage()
    {
        if ($this->vehicle_info != null) {
            $this->existingImage = $this->vehicle_info->image;
        }
        $this->image = null;
    }


    public function submit()
    {
        $vehicle_info = ModelsVehicle::where('id', $this->employee->vehicle['id'])->first();
        // dd($passport_info->id);

        if ($vehicle_info->vehicle_no == $this->vehicle_no) {
            $this->validate([
                'vehicle_no' => 'required',
                'issue_date' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        } else {
            $this->validate([
                'vehicle_no' => 'required|unique:vehicles',
                'issue_date' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        }


        // dd($this->image);

        $vehicle_info->vehicle_no = $this->vehicle_no;
        $vehicle_info->issue_date = $this->issue_date;
        $vehicle_info->expiry_date = $this->expiry_date;
        // Use the helper to upload the image
        if ($this->image) {
            $vehicle_info->image = uploadImage($this->image, 'employee/vehicle', $vehicle_info->image);
        }
        $vehicle_info->save();


        sleep(2); // Simulating a delay
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Vehicle Info has been updates successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.employee.vehicle');
    }
}
