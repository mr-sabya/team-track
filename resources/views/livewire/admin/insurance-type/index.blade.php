<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>{{ $isEditMode ? 'Edit' : 'Add' }} {{ $title }}</h3>

            </div>
            <div class="card-body">
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="mb-4">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" id="type" wire:model="type" class="form-control">
                        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ $isEditMode ? 'Update' : 'Save' }}
                    </button>

                    @if ($isEditMode)
                    <button type="button" wire:click="resetFields" class="btn btn-secondary">
                        Cancel
                    </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>{{ $title }} List</h3>
                <a href="{{ route('insurance.trash') }}" wire:navigate class="btn btn-primary"><i class="ri-delete-bin-line"></i> Trash ({{ $trash }})</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered w-100">
                        <thead class="">
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($insuranceTypes as $insuranceType)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $insuranceType->type }}</td>
                                <td>
                                    <button wire:click="edit({{ $insuranceType->id }})" class="btn btn-primary btn-sm">
                                        <i class="ri-edit-line"></i>
                                    </button>

                                    <button wire:click="confirmDelete({{ $insuranceType->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No results found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this record? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteConfirmed" data-bs-dismiss="modal">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- end row -->