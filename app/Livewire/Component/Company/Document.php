<?php

namespace App\Livewire\Component\Company;

use App\Enums\DocumentType;
use App\Models\Document as ModelsDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\WithFileUploads;

class Document extends Component
{
    use WithFileUploads;

    public $company_id;
    public $type;
    public $identifier;
    public $issue_date;
    public $expiry_date;
    public $amount;
    public $period;
    public $status = 'active';
    public $attachment;
    public $documentId;

    // Reset form for new document creation
    public function resetForm()
    {
        $this->reset([
            'company_id',
            'type',
            'identifier',
            'issue_date',
            'expiry_date',
            'amount',
            'period',
            'attachment',
            'documentId',
        ]);
    }

    // Save new document
    public function save()
    {
        $validated = $this->validate();

        if ($this->attachment) {
            $validated['attachment'] = $this->attachment->store('documents');
        }

        Document::create($validated);

        session()->flash('success', 'Document saved successfully!');
        $this->resetForm(); // Close modal after saving
    }

    // Edit document
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        $this->documentId = $document->id;
        $this->company_id = $document->company_id;
        $this->type = $document->type;
        $this->identifier = $document->identifier;
        $this->issue_date = $document->issue_date;
        $this->expiry_date = $document->expiry_date;
        $this->amount = $document->amount;
        $this->period = $document->period;
        $this->status = $document->status;
    }

    // Update document
    public function update()
    {
        $validated = $this->validate();

        if ($this->attachment) {
            $validated['attachment'] = $this->attachment->store('documents');
        }

        Document::where('id', $this->documentId)->update($validated);

        session()->flash('success', 'Document updated successfully!');
        $this->resetForm(); // Close modal after updating
    }

    // Delete document
    public function delete($id)
    {
        $document = Document::findOrFail($id);
        if ($document->attachment) {
            Storage::delete($document->attachment);
        }
        $document->delete();

        session()->flash('success', 'Document deleted successfully!');
    }

    public function render()
    {
        return view('livewire.component.company.document', [
            'documentTypes' => DocumentType::cases(),
            'documents' => ModelsDocument::all(),
        ]);
    }
}
