<div>

    @if (session()->has('message'))
    <div class="flash-message alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if($isDatatable == true)
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
    @endif

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
                <th>Company</th>
                <th>Passport Expiry</th>
                <th>Visa Expiry</th>
                <th>Emirates ID Expiry</th>
                <th>Insurance Expiry</th>
                <th>Vehicle Expiry</th>
                <th>Driving License Expiry</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                <td>{{ $item->company['name'] ?? 'N/A' }}</td>
                <td> {{ $item->passport['expiry_date'] }} </td>
                <td> {{ $item->visa['expiry_date'] }} </td>
                <td> {{ $item->emiratesInfo['expiry_date'] }} </td>
                <td> {{ $item->insuranceInfo['expiry_date'] }} </td>
                <td> {{ $item->vehicle['expiry_date'] }} </td>
                <td> {{ $item->drivingLicense['expiry_date'] }} </td>
                <td>
                    @if($isCompanyRoute != null)
                    <a href="{{ route('company-dash.employee.edit', $item->id) }}" wire:navigate class="btn btn-primary btn-sm">
                        <i class="ri-edit-line"></i>
                    </a>
                    @else
                    <a href="{{ route('employee.edit', $item->id) }}" wire:navigate class="btn btn-primary btn-sm">
                        <i class="ri-edit-line"></i>
                    </a>
                    @endif
                    <button class="btn btn-danger btn-sm" wire:click="confirmDelete({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="ri-delete-bin-line"></i>
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

    @if($isDatatable == true)
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
    @endif


    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" wire:ignore.self>
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