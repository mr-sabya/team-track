<?php

namespace App\Livewire\Admin\Employee;

use App\Models\Passport as ModelsPassport;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Passport extends Component
{
    use WithFileUploads;

    public $employee, $passport_info, $passport_no, $issue_date, $expiry_date, $image;
    public $existingImage;

    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->passport_info = ModelsPassport::where('id', $this->employee->passport['id'])->first();
        // dd($visa_info);
        $this->passport_no = $this->passport_info->passport_no;
        $this->issue_date = $this->passport_info->issue_date;
        $this->expiry_date = $this->passport_info->expiry_date;
        $this->existingImage = $this->passport_info->image;
    }

    public function handleChange()
    {
        $this->existingImage = null;
    }

    public function clearImage()
    {
        if ($this->passport_info != null) {
            $this->existingImage = $this->passport_info->image;
        }
        $this->image = null;
    }


    public function submit()
    {
        $passport_info = ModelsPassport::where('id', $this->employee->passport['id'])->first();
        // dd($passport_info->id);

        if ($passport_info->passport_no == $this->passport_no) {
            $this->validate([
                'passport_no' => 'required',
                'issue_date' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        } else {
            $this->validate([
                'passport_no' => 'required|unique:passports',
                'issue_date' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        }


        // dd($this->image);

        $passport_info->passport_no = $this->passport_no;
        $passport_info->issue_date = $this->issue_date;
        $passport_info->expiry_date = $this->expiry_date;
        // Use the helper to upload the image
        if ($this->image) {
            $passport_info->image = uploadImage($this->image, 'employee/passport', $passport_info->image);
        }
        $passport_info->save();


        sleep(2); // Simulating a delay
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Passport Info has been updates successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.employee.passport');
    }
}
