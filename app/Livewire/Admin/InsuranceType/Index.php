<?php

namespace App\Livewire\Admin\InsuranceType;

use App\Models\InsuranceType;
use Livewire\Component;

class Index extends Component
{
    public $title;

    public $insuranceTypes, $type, $insuranceTypeId;
    public $isEditMode = false;


    public function mount($title)
    {
        $this->title = $title;
    }

    protected $rules = [
        'type' => 'required|string|max:255',
    ];

    public function resetFields()
    {
        $this->type = '';
        $this->insuranceTypeId = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();
        InsuranceType::create(['type' => $this->type]);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Insurance Type been created successfully!']);
        $this->resetFields();
    }

    public function edit($id)
    {
        $insuranceType = InsuranceType::findOrFail($id);
        $this->insuranceTypeId = $insuranceType->id;
        $this->type = $insuranceType->type;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();
        $insuranceType = InsuranceType::findOrFail($this->insuranceTypeId);
        $insuranceType->update(['type' => $this->type]);
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Insurance Type been updated successfully!']);
        $this->resetFields();
    }

    public function delete($id)
    {
        InsuranceType::findOrFail($id)->delete();
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Insurance Type been deleted successfully!']);
    }

    public function render()
    {
        $this->insuranceTypes = InsuranceType::all();
        return view('livewire.admin.insurance-type.index');
    }
}
