<div>
    <div class="mb-3">
        <form wire:submit.prevent="{{ $attachmentId ? 'update' : 'create' }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Attachment Name</label>
                        <input type="text" id="name" class="form-control" wire:model.defer="name" placeholder="e.g., VAT Certificate, Corporate Tax Certificate">
                        <small class="form-text text-muted">Provide the name of the attachment, such as VAT Certificate, Corporate Tax Certificate, or similar.</small>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <select id="year" class="form-control" wire:model.defer="year">
                            <option value="">Select Year</option>
                            @for ($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                        <small class="form-text text-muted">Select a valid year (e.g., 2023).</small>
                        @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Attachment File</label>
                        <div>
                            @if ($attachmentId && $newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" class="img-thumbnail mb-2" width="150">
                            @elseif ($attachmentId && $attachments->find($attachmentId)->image)
                            <img src="{{ Storage::url($attachments->find($attachmentId)->image) }}" class="img-thumbnail mb-2" width="150">
                            @endif
                        </div>
                        <input type="file" id="image" class="form-control" wire:model.defer="{{ $attachmentId ? 'newImage' : 'image' }}">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ $attachmentId ? 'Update Attachment' : 'Add Attachment' }}
            </button>
            @if ($attachmentId)
            <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancel</button>
            @endif
        </form>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attachments as $attachment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attachment->name }}</td>
                    <td>{{ $attachment->year }}</td>
                    <td>
                        @if ($attachment->image)
                        <a href="{{ Storage::url($attachment->image) }}" target="_blank">View File</a>
                        @else
                        No File
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" wire:click="edit({{ $attachment->id }})">Edit</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $attachment->id }})">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No attachments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>