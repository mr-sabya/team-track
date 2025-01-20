<div>

    @if (session()->has('message'))
    <div class="flash-message alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <select class="form-select w-auto d-inline-block" wire:model.live="perPage">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <input type="text" class="form-control w-50" placeholder="Search..." wire:model.debounce.300ms="search">
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th wire:click="sortBy('id')" class="text-center table-click">
                    ID
                    @if ($sortField === 'id')
                    <i class="ri-arrow-drop-{{ $sortDirection === 'asc' ? 'down' : 'up' }}-line"></i>
                    @endif
                </th>
                <th wire:click="sortBy('name')" class="table-click">
                    Company Name
                    @if ($sortField === 'name')
                    <i class="ri-arrow-drop-{{ $sortDirection === 'asc' ? 'down' : 'up' }}-line"></i>
                    @endif
                </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $company->name }}</td>
                <td>
                    <!-- Restore Button -->
                    <button class="btn btn-primary btn-sm" wire:click="restore({{ $company->id }})">
                        <i class="ri-refresh-line"></i> Restore
                    </button>

                    <!-- Delete Button -->
                    <button class="btn btn-danger btn-sm" wire:click="confirmDelete({{ $company->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="ri-delete-bin-line"></i> Delete
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

    <div class="d-flex justify-content-between">
        <div>
            Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of {{ $companies->total() }} entries
        </div>
        <div>
            {{ $companies->links() }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to permanently delete this company?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="delete" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>