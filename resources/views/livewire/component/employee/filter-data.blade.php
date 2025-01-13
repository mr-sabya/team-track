<div class="mt-4">
    <div class="d-flex justify-content-between mb-4">
        <div class="filter" style="width: 70%;">
            <div class="row">
                <!-- Search Box -->
                <div class="col-md-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search users..."
                        wire:model.live="search" />
                </div>

                <div class="col-md-3">
                    <select class="form-control" wire:model.live="company_id">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Relation Filter -->
                <div class="col-md-3">
                    <select class="form-control" wire:model.live="relation">
                        <option value="all">All</option>
                        <option value="visa">Visa</option>
                        <option value="passport">Passport</option>
                        <option value="vehicle">Vehicle</option>
                        <option value="drivingLicense">Driving License</option>
                        <option value="emiratesInfo">Emirates Info</option>
                        <option value="insuranceInfo">Insurance Info</option>
                    </select>
                </div>

                <!-- Expiry Status Filter -->
                <div class="col-md-3">
                    <select class="form-control" wire:model.live="filter">
                        <option value="all">All Users</option>
                        <option value="expired">Expired</option>
                        <option value="expiring">Expiring (Next 30 Days)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="">
            <button wire:click="export" class="btn btn-primary"> <i class="ri-download-line"></i> Download Excel</button>
        </div>
    </div>



    <!-- User Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Country</th>
                <th>Relation</th>
                <th>Expiry Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone ?? 'N/A' }}</td>
                <td>{{ $user->address ?? 'N/A' }}</td>
                <td>{{ $user->country['name'] ?? 'N/A' }}</td>
                <td>{{ ucfirst($relation) }}</td>
                <td>
                    @if($user->$relation && $user->$relation->expiry_date)
                    {{ $user->$relation->expiry_date }}
                    @else
                    N/A
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
        {{ $users->links() }}
    </div>
</div>