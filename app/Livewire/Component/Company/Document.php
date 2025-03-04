<?php

namespace App\Livewire\Component\Company;

use App\Models\Document as ModelsDocument;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Document extends Component
{
    use WithFileUploads, WithPagination, WithoutUrlPagination;

    public $company_id;
    public $document_type_id;
    public $identifier;
    public $issue_date;
    public $expiry_date;
    public $amount;
    public $period_start;
    public $period_end;
    public $period;
    public $status = 'active';
    public $attachment;
    public $documentId;
    public $oldAttachment;


    protected $rules = [
        'document_type_id' => 'required',
        'identifier' => 'nullable|string|max:255',
        'issue_date' => 'nullable|date',
        'expiry_date' => 'nullable|date|after_or_equal:issue_date',
        'amount' => 'nullable|numeric',
        'period_start' => 'nullable|date',
        'period_end' => 'nullable|date|after_or_equal:period_start',
        'period' => 'nullable|string|max:255',
        'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Adjust as needed
    ];


    // Reset form for new document creation
    public function resetForm()
    {
        $this->reset([
            'company_id',
            'document_type_id',
            'identifier',
            'issue_date',
            'expiry_date',
            'amount',
            'period_start',
            'period_end',
            'period',
            'attachment',
            'documentId',
            'oldAttachment',
        ]);
    }


    public function mount($companyId)
    {
        $this->company_id = $companyId;
        // dd($this->company_id);
    }

    // Save new document
    public function save()
    {
        $validated = $this->validate();

        $validated['company_id'] = $this->company_id;

        if ($this->attachment) {
            $validated['attachment'] = $this->attachment->store('documents', 'public');
        }
        // dd($validated);

        ModelsDocument::create($validated);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Document has been created successfully!']);
        $this->resetForm(); // Close modal after saving
    }

    // Edit document
    public function edit($id)
    {
        $document = ModelsDocument::findOrFail($id);
        $this->documentId = $document->id;
        $this->company_id = $document->company_id;
        $this->document_type_id = $document->document_type_id;
        $this->identifier = $document->identifier;
        $this->issue_date = $document->issue_date;
        $this->expiry_date = $document->expiry_date;
        $this->amount = $document->amount;
        $this->period_start = $document->period_start;
        $this->period_end = $document->period_end;
        $this->period = $document->period;
        $this->status = $document->status;
        $this->oldAttachment = $document->attachment; // store the old image path
        $this->attachment = null; // clear the new upload field
    }

    // Update document
    public function update()
    {
        $validated = $this->validate();

        if ($this->attachment) {
            $validated['attachment'] = $this->attachment->store('documents', 'public');
        }

        ModelsDocument::where('id', $this->documentId)->update($validated);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Document has been updated successfully!']);
        $this->resetForm(); // Close modal after updating
    }

    // Delete document
    public function delete($id)
    {
        $document = ModelsDocument::findOrFail($id);
        if ($document->attachment) {
            Storage::delete($document->attachment);
        }
        $document->delete();

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Document has been deleted successfully!']);
    }

    public function render()
    {
        return view('livewire.component.company.document', [
            'documentTypes' => DocumentType::all(),
            'documents' => ModelsDocument::orderBy('id', 'desc')->paginate(5),
        ]);
    }
}
