<div class="row">
    <!-- Left Column: Form -->
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                {{ $documentId ? 'Edit Document' : 'Create Document' }}
            </div>
            <div class="card-body">
                <form wire:submit.prevent="{{ $documentId ? 'update' : 'save' }}" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Document Type</label>
                        <select class="form-control" wire:model="document_type_id" required>
                            <option value="">Select Type</option>
                            @foreach($documentTypes as $docType)
                            <option value="{{ $docType->id }}">{{ $docType->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Identifier</label>
                        <input type="text" class="form-control" wire:model="identifier">
                        <small>i.e. license number/bill number</small>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Issue Date</label>
                                <input type="date" class="form-control" wire:model="issue_date">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Expiry Date</label>
                                <input type="date" class="form-control" wire:model="expiry_date">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Period Start Date</label>
                                <input type="date" class="form-control" wire:model="period_start">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Period End Date</label>
                                <input type="date" class="form-control" wire:model="period_end">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Period (Months/Days)</label>
                                <input type="text" class="form-control" wire:model="period">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" class="form-control" wire:model="amount" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="">
                        @if ($attachment)
                        <img src="{{ $attachment->temporaryUrl() }}" class="img-thumbnail mb-2" width="150">
                        @elseif ($oldAttachment)
                        <img src="{{ Storage::url($oldAttachment) }}" class="img-thumbnail mb-2" width="150">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Attachment</label>
                        <input type="file" class="form-control" wire:model="attachment">
                    </div>



                    <button type="submit" class="btn btn-primary w-100">
                        {{ $documentId ? 'Update Document' : 'Save Document' }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Column: Documents -->
    <div class="col-md-7">
        <div class="row">
            @forelse($documents as $document)
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-2">
                            <span class="fw-bold">Document Type : </span>{{ $document->documentType['name'] }}
                        </h5>

                        <div class="row">

                            <!-- Document Image -->
                            <div class="col-md-4">
                                <div class="p-2">
                                    @if ($document->attachment)
                                    <img src="{{ Storage::url($document->attachment) }}" class="img-fluid rounded-start w-100" alt="Attachment">
                                    @else
                                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start w-100" alt="No Attachment">
                                    @endif
                                </div>
                            </div>

                            <!-- Document Info -->
                            <div class="col-md-8">
                                <div class="row">
                                    <!-- Left Column: Issue Date and Period Start -->
                                    <div class="col-md-6 mb-2">
                                        <div class="fw-bold">Issue Date:</div>
                                        <div>{{ \Carbon\Carbon::parse($document->issue_date)->format('d-m-Y') }}</div>
                                    </div>


                                    <!-- Right Column: Expiry Date and Period End -->
                                    <div class="col-md-6 mb-2">
                                        <div class="fw-bold">Expiry Date:</div>
                                        <div class="{{ \Carbon\Carbon::parse($document->expiry_date)->isPast() ? 'text-danger' : '' }}">
                                            {{ \Carbon\Carbon::parse($document->expiry_date)->format('d-m-Y') }}
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <div class="fw-bold">Period Start:</div>
                                        <div>{{ \Carbon\Carbon::parse($document->period_start)->format('d-m-Y') }}</div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <div class="fw-bold">Period End:</div>
                                        <div class="{{ \Carbon\Carbon::parse($document->period_end)->isPast() ? 'text-danger' : '' }}">
                                            {{ \Carbon\Carbon::parse($document->period_end)->format('d-m-Y') }}
                                        </div>
                                    </div>

                                    <!-- Right Column: Period -->
                                    <div class="col-md-6 mb-2">
                                        <div class="fw-bold">Period:</div>
                                        <div>{{ $document->period }}</div>
                                    </div>

                                    <!-- Left Column: Amount -->
                                    <div class="col-md-6 mb-2">
                                        <div class="fw-bold">Amount:</div>
                                        <div>{{ $document->amount }}</div>
                                    </div>



                                    <div class="d-flex">
                                        <button wire:click="edit({{ $document->id }})" class="btn btn-sm btn-warning me-2">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <button wire:click="delete({{ $document->id }})" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            {{ $documents->links() }}
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                No documents found.
            </div>
        </div>
        @endforelse
    </div>
</div>