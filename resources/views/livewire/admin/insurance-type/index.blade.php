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
                                    <button wire:click="delete({{ $insuranceType->id }})" class="btn btn-danger btn-sm">
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
    </div>
</div>
<!-- end row -->