<div>


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $isEditing ? 'Edit' : 'Add' }} {{ $title }}</h3>

                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input
                                type="text"
                                id="name"
                                wire:model="name"
                                class="form-control"
                                placeholder="Enter permission name" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">
                            {{ $isEditing ? 'Update Permission' : 'Create Permission' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $title }} List</h3>

                </div>
                <div class="card-body">
                    <div class="mb-4 w-50">
                        <input
                            type="text"
                            wire:model="search"
                            placeholder="Search roles..."
                            class="form-control" />
                    </div>
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>
                                    <button wire:click="edit({{ $permission->id }})" class="btn btn-sm btn-primary">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <button wire:click="delete({{ $permission->id }})" class="btn btn-sm btn-danger">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No permissions found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $permissions->links() }}
                </div>
            </div>
        </div>



    </div>
</div>