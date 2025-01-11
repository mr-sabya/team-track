<?php

namespace App\Livewire\Component\Employee;

use App\Exports\UserDataExport;
use App\Imports\UserDataImport;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UserDataUpload extends Component
{
    use WithFileUploads;

    public $file;

    // Validation rules for the uploaded file
    // protected $rules = [];

    public function uploadData()
    {
        // dd($this->file);
        // Validate the file input
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv|max:2048', // Max 2MB for example
        ]);

        try {
            

            // Ensure we pass the temporary file path to Excel::import
            Excel::import(new UserDataImport, $this->file);
            $this->file = '';

            // Dispatch a success alert
            $this->dispatch('alert', ['type' => 'success', 'message' => 'User data uploaded successfully!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Invalid file uploaded!'. $e->getMessage()]);
            Log::error('File upload error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Log the actual error for debugging
            Log::error('File upload error: ' . $e->getMessage());

            // Dispatch a generic error alert
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Error to upload file!'. $e->getMessage()]);
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
