<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $isEditing ? 'Edit' : 'Add' }} {{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                        <div class="form-group">
                            <label for="name">Document Type Name</label>
                            <input
                                type="text"
                                id="name"
                                wire:model="name"
                                class="form-control"
                                placeholder="Enter document type name" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">
                            {{ $isEditing ? 'Update Document Type' : 'Create Document Type' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $title }} List</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4 w-50">
                        <input
                            type="text"
                            wire:model="search"
                            placeholder="Search document types..."
                            class="form-control" />
                    </div>
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documentTypes as $documentType)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $documentType->name }}</td>
                                <td>
                                    <button wire:click="edit({{ $documentType->id }})" class="btn btn-sm btn-primary">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <button wire:click="delete({{ $documentType->id }})" class="btn btn-sm btn-danger">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No document types found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $documentTypes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>