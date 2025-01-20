<div>

    <!-- Flash Message for Success -->
    @if (session()->has('message'))
    <div class="flash-message alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <!-- Search and Pagination Controls -->
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

    <!-- Table displaying trashed users -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <!-- ID Column -->
                <th wire:click="sortBy('id')" class="text-center table-click">
                    ID
                    @if ($sortField === 'id')
                    <i class="ri-arrow-drop-{{ $sortDirection === 'asc' ? 'down' : 'up' }}-line"></i>
                    @endif
                </th>

                <!-- Name Column -->
                <th wire:click="sortBy('first_name')" class="table-click">
                    Name
                    @if ($sortField === 'first_name')
                    <i class="ri-arrow-drop-{{ $sortDirection === 'asc' ? 'down' : 'up' }}-line"></i>
                    @endif
                </th>

                <th>Company</th>
                <th>Passport Expiry</th>
                <th>Visa Expiry</th>
                <th>Emirates ID Expiry</th>
                <th>Insurance Expiry</th>
                <th>Vehicle Expiry</th>
                <th>Driving License Expiry</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->company['name'] ?? 'N/A' }}</td>
                <td> {{ $user->passport['expiry_date'] }} </td>
                <td> {{ $user->visa['expiry_date'] }} </td>
                <td> {{ $user->emiratesInfo['expiry_date'] }} </td>
                <td> {{ $user->insuranceInfo['expiry_date'] }} </td>
                <td> {{ $user->vehicle['expiry_date'] }} </td>
                <td> {{ $user->drivingLicense['expiry_date'] }} </td>
                <td>
                    <!-- Restore Button -->
                    <button class="btn btn-primary btn-sm" wire:click="restore({{ $user->id }})">
                        <i class="ri-refresh-line"></i> Restore
                    </button>

                    <!-- Delete Button -->
                    <button class="btn btn-danger btn-sm" wire:click="confirmDelete({{ $user->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="ri-delete-bin-line"></i> Delete
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center">No results found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="{{ !$users->hasMorePages() ? 'd-flex justify-content-between' : '' }}">
        @if(!$users->hasMorePages())
        <div>
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
        </div>
        @endif
        <div>
            {{ $users->links() }}
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
                    Are you sure you want to delete this record? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="delete" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>