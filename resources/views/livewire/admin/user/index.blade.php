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
                <th wire:click="sortBy('first_name')" class="table-click">
                    Name
                    @if ($sortField === 'first_name')
                    <i class="ri-arrow-drop-{{ $sortDirection === 'asc' ? 'down' : 'up' }}-line"></i>
                    @endif
                </th>
                <th>Email</th>
                <th>User Type</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    {{ $item->is_superadmin ? 'Super Admin' : ''}}
                    {!! $item->is_company ? 'Company <strong>(' . $item->company['name'] . ')</strong>' : '' !!}
                </td>
                <td>
                    {{ $item->roles->first()->name ?? 'No Role Assigned' }}
                </td>
                <td>
                    <a href="{{ route('user.edit', $item->id)}}" wire:navigate class="btn btn-primary btn-sm">
                        <i class="ri-edit-line"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" wire:click="confirmDelete({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No results found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="{{ !$data->hasMorePages() ? 'd-flex justify-content-between' : '' }}">
        @if(!$data->hasMorePages())
        <div>
            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
        </div>
        @endif
        <div>
            {{ $data->links() }}
        </div>
    </div>



    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="delete" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>


</div>