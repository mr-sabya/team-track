<?php

namespace App\Livewire\Admin\InsuranceType;

use App\Models\InsuranceType;
use Livewire\Component;

class Trash extends Component
{
    public $title;

    public $insuranceTypes, $type, $insuranceTypeId, $insuranceTypeIdToDelete;


    public function mount($title)
    {
        $this->title = $title;
    }

    public function restore($id)
    {
        $insuranceType = InsuranceType::onlyTrashed()->find($id);
        if($insuranceType){
            $insuranceType->restore();
            $this->dispatch('alert', ['type' => 'success',  'message' => 'Insurance Type has been restored.']);
        }else{
            $this->dispatch('alert', ['type' => 'error',  'message' => 'Error in restoreing...']);
        }
    }

    // Method to set ID for deletion
    public function confirmDelete($id)
    {
        $this->insuranceTypeIdToDelete = $id;
    }

    // Method to delete the record
    public function deleteConfirmed()
    {
        if ($this->insuranceTypeIdToDelete) {
            InsuranceType::onlyTrashed()->find($this->insuranceTypeIdToDelete)->forceDelete();
            $this->insuranceTypeIdToDelete = null;
            $this->dispatch('alert', ['type' => 'success',  'message' => 'Insurance Type has been deleetd permanently.']);
        }
    }


    public function render()
    {
        $this->insuranceTypes = InsuranceType::onlyTrashed()->get();
        return view('livewire.admin.insurance-type.trash');
    }
}
