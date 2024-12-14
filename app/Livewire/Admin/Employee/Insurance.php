<?php

namespace App\Livewire\Admin\Employee;

use App\Models\InsuranceInfo;
use App\Models\InsuranceType;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Insurance extends Component
{
    use WithFileUploads;

    public $employee, $insurance_info, $insurance_no, $type_id, $expiry_date, $image;
    public $existingImage;

    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->insurance_info = InsuranceInfo::where('id', $this->employee->insuranceInfo['id'])->first();
        // dd($visa_info);
        $this->insurance_no = $this->insurance_info->insurance_no;
        $this->type_id = $this->insurance_info->type_id;
        $this->expiry_date = $this->insurance_info->expiry_date;
        $this->existingImage = $this->insurance_info->image;
    }

    public function handleChange()
    {
        $this->existingImage = null;
    }

    public function clearImage()
    {
        if ($this->insurance_info != null) {
            $this->existingImage = $this->insurance_info->image;
        }
        $this->image = null;
    }


    public function submit()
    {
        $insurance_info = InsuranceInfo::where('id', $this->employee->insuranceInfo['id'])->first();
        // dd($passport_info->id);

        if ($insurance_info->insurance_no == $this->insurance_no) {
            $this->validate([
                'insurance_no' => 'required',
                'type_id' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        } else {
            $this->validate([
                'insurance_no' => 'required|unique:insurance_infos',
                'type_id' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        }


        // dd($this->image);

        $insurance_info->insurance_no = $this->insurance_no;
        $insurance_info->type_id = $this->type_id;
        $insurance_info->expiry_date = $this->expiry_date;
        // Use the helper to upload the image
        if ($this->image) {
            $insurance_info->image = uploadImage($this->image, 'employee/vehicle', $insurance_info->image);
        }
        $insurance_info->save();


        sleep(2); // Simulating a delay
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Vehicle Info has been updates successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.employee.insurance',[
            'types' => InsuranceType::all(),
        ]);
    }
}
