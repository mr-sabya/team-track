<div>


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $isEditing ? 'Edit' : 'Add' }} {{ $title }}</h3>

                </div>
                <div class="card-body">

                    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                        <div class="form-group mb-4">
                            <label for="name">Role Name</label>
                            <input
                                type="text"
                                id="name"
                                wire:model="name"
                                class="form-control"
                                placeholder="Enter role name" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <label>Assign Permissions</label>
                        <div>
                            @foreach ($permissions as $permission)
                            <div class="form-group">
                                <label class="mr-3">
                                    <input
                                        type="checkbox"
                                        wire:model="selectedPermissions"
                                        value="{{ $permission->id }}" />
                                    {{ $permission->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">
                            {{ $isEditing ? 'Update Role' : 'Create Role' }}
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


                    <div class="table-responsive">
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if($role->permissions->isEmpty())
                                        <span class="text-muted">No Permissions</span>
                                        @else
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="edit({{ $role->id }})" class="btn btn-sm btn-primary">
                                            <i class="ri-edit-line"></i>
                                        </button>
                                        <button wire:click="delete({{ $role->id }})" class="btn btn-sm btn-danger">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No roles found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $roles->links() }}
                </div>
            </div>
        </div>



    </div>
</div>