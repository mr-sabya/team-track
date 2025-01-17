<?php

namespace App\Livewire\Component\Employee;

use App\Exports\UserDataExport;
use App\Imports\UserDataImport;
use App\Models\Company;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UserDataUpload extends Component
{
    use WithFileUploads;

    public $file;
    public $companyId; // Nullable, set externally if needed
    public $companies; // List of companies for the dropdown

    // Validation rules for the uploaded file
    // protected $rules = [];

    public function mount($companyId = null)
    {
        $this->companyId = $companyId; // Use the provided companyId or null
        $this->companies = $this->companyId ? [] : Company::all(); // Load companies only if no companyId is passed
    }

    public function uploadData()
    {
        // Validate the file input
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv|max:2048',
        ]);

        // If companyId is not set, validate the selection
        if (!$this->companyId) {
            $this->validate([
                'companyId' => 'required|exists:companies,id',
            ]);
        }


        try {
            // Pass the companyId to the import logic
            Excel::import(new UserDataImport($this->companyId), $this->file->getRealPath());

            // Reset file input
            $this->file = '';
            if (!$this->companyId) {
                $this->companyId = null; // Reset dropdown selection if needed
            }

            // Dispatch success alert
            $this->dispatch('alert', ['type' => 'success', 'message' => 'User data uploaded successfully!']);
        } catch (\Exception $e) {
            // Handle errors and dispatch an alert
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Error uploading file: ' . $e->getMessage()]);
            Log::error('File upload error: ' . $e->getMessage());
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
