<?php

namespace App\Livewire\Component\Employee;

use App\Models\EmiratesInfo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Emirates extends Component
{
    use WithFileUploads;

    public $employee, $emirates_info, $emirates_id_no, $card_no, $expiry_date, $image;
    public $existingImage;

    public function mount($id)
    {
        $this->employee = User::find($id);
        $this->emirates_info = EmiratesInfo::where('id', $this->employee->emiratesInfo['id'])->first();
        // dd($visa_info);
        $this->emirates_id_no = $this->emirates_info->emirates_id_no;
        $this->card_no = $this->emirates_info->card_no;
        $this->expiry_date = $this->emirates_info->expiry_date;
        $this->existingImage = $this->emirates_info->image;
    }

    public function handleChange()
    {
        $this->existingImage = null;
    }

    public function clearImage()
    {
        if ($this->emirates_info != null) {
            $this->existingImage = $this->emirates_info->image;
        }
        $this->image = null;
    }


    public function submit()
    {
        $emirates_info = EmiratesInfo::where('id', $this->employee->emiratesInfo['id'])->first();
        // dd($passport_info->id);

        if ($emirates_info->emirates_id_no == $this->emirates_id_no && $emirates_info->card_no == $this->card_no) {
            $this->validate([
                'emirates_id_no' => 'required',
                'card_no' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        } elseif ($emirates_info->emirates_id_no == $this->emirates_id_no) {
            $this->validate([
                'emirates_id_no' => 'required',
                'card_no' => 'required|unique:emirates_infos',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        } elseif ($emirates_info->card_no == $this->card_no) {
            $this->validate([
                'emirates_id_no' => 'required|unique:emirates_infos',
                'card_no' => 'required',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        } else {
            $this->validate([
                'emirates_id_no' => 'required|unique:emirates_infos',
                'card_no' => 'required|unique:emirates_infos',
                'expiry_date' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        }


        // dd($this->image);

        $emirates_info->emirates_id_no = $this->emirates_id_no;
        $emirates_info->card_no = $this->card_no;
        $emirates_info->expiry_date = $this->expiry_date;
        // Use the helper to upload the image
        if ($this->image) {
            $emirates_info->image = uploadImage($this->image, 'employee/emirates', $emirates_info->image);
        }
        $emirates_info->save();


        sleep(2); // Simulating a delay
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Emirates Info has been updates successfully!']);
    }
    
    public function render()
    {
        return view('livewire.component.employee.emirates');
    }
}
