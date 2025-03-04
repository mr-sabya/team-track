<?php

namespace App\Livewire\Admin\DocumentType;

use App\Models\DocumentType;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $name, $search, $documentTypeId;
    public $isEditing = false;
    public $title = 'Document Type';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|unique:document_types,name',
    ];

    public function store()
    {
        $this->validate();

        DocumentType::create(['name' => $this->name]);

        $this->resetForm();
        session()->flash('success', 'Document Type created successfully.');
    }

    public function edit($id)
    {
        $documentType = DocumentType::findOrFail($id);
        $this->documentTypeId = $documentType->id;
        $this->name = $documentType->name;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:document_types,name,' . $this->documentTypeId,
        ]);

        $documentType = DocumentType::findOrFail($this->documentTypeId);
        $documentType->update(['name' => $this->name]);

        $this->resetForm();
        session()->flash('success', 'Document Type updated successfully.');
    }

    public function delete($id)
    {
        DocumentType::findOrFail($id)->delete();
        session()->flash('success', 'Document Type deleted successfully.');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->documentTypeId = null;
        $this->isEditing = false;
    }

    public function render()
    {
        $documentTypes = DocumentType::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.admin.document-type.index', [
            'documentTypes' => $documentTypes,
        ]);
    }
}
