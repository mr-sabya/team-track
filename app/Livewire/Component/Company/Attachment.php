<?php

namespace App\Livewire\Component\Company;

use App\Models\CompanyAttachment;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Attachment extends Component
{
    use WithFileUploads;

    public $attachments, $attachmentId, $companyId;
    public $name, $year, $image, $newImage;

    public function mount($companyId)
    {
        $this->companyId = $companyId;
        $this->year = date('Y');
        $this->loadAttachments();
    }

    public function loadAttachments()
    {
        $this->attachments = CompanyAttachment::where('company_id', $this->companyId)->get();
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'image' => 'required|image|max:2048',
        ]);

        $path = $this->image->store('attachments', 'public');

        CompanyAttachment::create([
            'company_id' => $this->companyId,
            'name' => $this->name,
            'year' => $this->year,
            'image' => $path,
        ]);

        $this->resetForm();
        $this->loadAttachments();
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Attachment added successfully!']);
    }

    public function edit($id)
    {
        $attachment = CompanyAttachment::findOrFail($id);

        $this->attachmentId = $attachment->id;
        $this->name = $attachment->name;
        $this->year = $attachment->year;
        $this->newImage = null; // Reset new image
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'newImage' => 'nullable|image|max:2048',
        ]);

        $attachment = CompanyAttachment::findOrFail($this->attachmentId);

        if ($this->newImage) {
            // Delete old image
            if ($attachment->image && Storage::exists($attachment->image)) {
                Storage::delete($attachment->image);
            }

            // Store new image
            $path = $this->newImage->store('attachments', 'public');
            $attachment->image = $path;
        }

        $attachment->update([
            'name' => $this->name,
            'year' => $this->year,
        ]);

        $this->resetForm();
        $this->loadAttachments();
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Attachment updated successfully!']);
    }

    public function delete($id)
    {
        $attachment = CompanyAttachment::findOrFail($id);

        if ($attachment->image && Storage::exists($attachment->image)) {
            Storage::delete($attachment->image);
        }

        $attachment->delete();
        $this->loadAttachments();

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Attachment deleted successfully!']);
    }

    public function resetForm()
    {
        $this->attachmentId = null;
        $this->name = null;
        $this->year = null;
        $this->image = null;
        $this->newImage = null;
    }

    public function render()
    {
        return view('livewire.component.company.attachment');
    }
}
