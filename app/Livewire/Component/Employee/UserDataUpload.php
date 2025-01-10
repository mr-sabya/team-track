<?php

namespace App\Livewire\Component\Employee;

use App\Exports\UserDataExport;
use App\Imports\UserDataImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UserDataUpload extends Component
{
    use WithFileUploads;

    public $file;

    // Validation rules for the uploaded file
    protected $rules = [
        'file' => 'required|file|mimes:xlsx,csv|max:10240',
    ];

    public function upload()
    {
        $this->validate();

        // Handle the file upload and parsing
        try {
            Excel::import(new UserDataImport, $this->file);
            session()->flash('message', 'Data uploaded successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Error uploading data: ' . $e->getMessage());
        }
    }


    public function demoExcelData()
    {
        Excel::download(new UserDataExport, 'user_data.xlsx');
    }

    public function render()
    {
        return view('livewire.component.employee.user-data-upload');
    }
}
