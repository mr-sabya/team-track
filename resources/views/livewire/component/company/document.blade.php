<div>
    <!-- Button to open modal -->
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#documentModal" wire:click="resetForm">
            Add Attachment
        </button>

        <div class="table-responsive">
            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Identifier</th>
                        <th>Issue Date</th>
                        <th>Expiry Date</th>
                        <th>Amount</th>
                        <th>Period</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $document)
                    <tr>
                        <td>{{ \App\Enums\DocumentType::getLabel($document->type) }}</td>
                        <td>{{ $document->identifier }}</td>
                        <td>{{ $document->issue_date }}</td>
                        <td>{{ $document->expiry_date }}</td>
                        <td>{{ $document->amount }}</td>
                        <td>{{ $document->period }}</td>
                        <td>
                            <button wire:click="edit({{ $document->id }})" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#documentModal">Edit</button>
                            <button wire:click="delete({{ $document->id }})" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No documents found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Create / Update -->
    <div class="modal fade" id="documentModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalLabel">{{ $documentId ? 'Edit Document' : 'Create Document' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $documentId ? 'update' : 'save' }}" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Document Type</label>
                                    <select class="form-control" wire:model="type" required>
                                        <option value="">Select Type</option>
                                        @foreach($documentTypes as $docType)
                                        <option value="{{ $docType->value }}">{{ \App\Enums\DocumentType::getLabel($docType) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Identifier</label>
                                    <input type="text" class="form-control" wire:model="identifier">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Issue Date</label>
                                    <input type="date" class="form-control" wire:model="issue_date">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control" wire:model="expiry_date">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Period</label>
                                    <input type="text" class="form-control" wire:model="period">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" wire:model="amount" step="0.01">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Attachment</label>
                                    <input type="file" class="form-control" wire:model="attachment">
                                </div>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ $documentId ? 'Update Document' : 'Save Document' }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>