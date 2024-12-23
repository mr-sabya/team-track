<div>

    <!-- show info -->
    <div class="row">
        <div class="col-lg-2">
            <livewire:theme.info-card title="Passport" model="Passport" className="bg-primary" icon="ri-passport-line" companyId="{{ $companyId }}" />
        </div>

        <!-- visa -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Visa" model="Visa" className="bg-warning" icon="ri-visa-line" companyId="{{ $companyId }}" />
        </div>


        <!-- Emirates ID -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Emirates ID" model="EmiratesInfo" className="bg-info" icon="ri-bank-card-line" companyId="{{ $companyId }}" />
        </div>


        <!-- insurance -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Insurance" model="InsuranceInfo" className="bg-primary" icon="ri-refund-line" companyId="{{ $companyId }}" />
        </div>


        <!-- vehicle -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Vehicle" model="Vehicle" className="bg-warning" icon="ri-truck-line" companyId="{{ $companyId }}" />
        </div>


        <!-- Driving License -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Driving L." model="DrivingLicense" className="bg-info" icon="ri-bank-card-2-line" companyId="{{ $companyId }}" />
        </div>


    </div>
    <!-- show info -->

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
                <td>{{ $item->company['name'] }}</td>
                <td> {{ $item->passport['expiry_date'] }} </td>
                <td> {{ $item->visa['expiry_date'] }} </td>
                <td> {{ $item->emiratesInfo['expiry_date'] }} </td>
                <td> {{ $item->insuranceInfo['expiry_date'] }} </td>
                <td> {{ $item->vehicle['expiry_date'] }} </td>
                <td> {{ $item->drivingLicense['expiry_date'] }} </td>
                <td>
                    <a href="{{ route('company-dash.employee.edit', $item->id) }}" wire:navigate class="btn btn-primary btn-sm">
                        <i class="ri-edit-line"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" wire:click="confirmDelete({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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