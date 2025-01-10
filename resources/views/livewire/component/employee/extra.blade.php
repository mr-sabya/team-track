<div class="row">
    <!-- Form Section -->
    <div class="col-5">

        <form wire:submit.prevent="{{ $userExtraId ? 'update' : 'create' }}">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" wire:model="name" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text:</label>
                <textarea id="text" wire:model="text" class="form-control" rows="3"></textarea>
                @error('text') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                {{ $userExtraId ? 'Update' : 'Create' }}
            </button>
        </form>

    </div>

    <!-- Table Section -->
    <div class="col-7">
        <label class="form-label">Extras:</label>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Text</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($userExtras as $userExtra)
                    <tr>
                        <td>{{ $userExtra->name }}</td>
                        <td>{{ $userExtra->text }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" wire:click="edit({{ $userExtra->id }})">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $userExtra->id }})">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>