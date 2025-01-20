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
    <div class="table-responsive">

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
                        Name
                        @if ($sortField === 'name')
                        <i class="ri-arrow-drop-{{ $sortDirection === 'asc' ? 'down' : 'up' }}-line"></i>
                        @endif
                    </th>
                    <th>Trade License</th>
                    <th>Establishment Card</th>
                    <th>Vehicles</th>
                    <th>Domain Subscriptions</th>
                    <th>Tenancy Agreement</th>
                    <th>Electricity Bills</th>
                    <th>Wifi Bills</th>
                    <th>Sewerage Bills</th>
                    <th>Mobile Bills</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @php
                        $trade_license_diff = \Carbon\Carbon::parse($item->trade_license)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $trade_license_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->trade_license }}
                            <br>
                            <strong>
                                @if($trade_license_diff > 0)
                                (-{{ $trade_license_diff }} Days)
                                @else
                                ({{ abs($trade_license_diff) }} Days)
                                @endif
                            </strong>
                        </div>

                    </td>
                    <td>
                        @php
                        $establishment_card_diff = \Carbon\Carbon::parse($item->establishment_card)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $establishment_card_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->establishment_card }}
                            <br>
                            <strong>
                                @if($establishment_card_diff > 0)
                                (-{{ $establishment_card_diff }} Days)
                                @else
                                ({{ abs($establishment_card_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>
                    <td>
                        @php
                        $vehicle_diff = \Carbon\Carbon::parse($item->vehicle)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $vehicle_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->vehicle }}
                            <br>
                            <strong>
                                @if($vehicle_diff > 0)
                                (-{{ $vehicle_diff }} Days)
                                @else
                                ({{ abs($vehicle_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>
                    <td>
                        @php
                        $domain_subscriptions_diff = \Carbon\Carbon::parse($item->domain_subscriptions)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $domain_subscriptions_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->domain_subscriptions }}
                            <br>
                            <strong>
                                @if($domain_subscriptions_diff > 0)
                                (-{{ $domain_subscriptions_diff }} Days)
                                @else
                                ({{ abs($domain_subscriptions_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>
                    <td>
                        @php
                        $tenancy_agreement_diff = \Carbon\Carbon::parse($item->tenancy_agreement)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $tenancy_agreement_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->tenancy_agreement }}
                            <br>
                            <strong>
                                @if($tenancy_agreement_diff > 0)
                                (-{{ $tenancy_agreement_diff }} Days)
                                @else
                                ({{ abs($tenancy_agreement_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>
                    <td>
                        @php
                        $electricity_bills_diff = \Carbon\Carbon::parse($item->electricity_bills)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $electricity_bills_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->electricity_bills }}
                            <br>
                            <strong>
                                @if($electricity_bills_diff > 0)
                                (-{{ $electricity_bills_diff }} Days)
                                @else
                                ({{ abs($electricity_bills_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>
                    <td>
                        @php
                        $wifi_bills_diff = \Carbon\Carbon::parse($item->wifi_bills)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $wifi_bills_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->wifi_bills }}
                            <br>
                            <strong>
                                @if($wifi_bills_diff > 0)
                                (-{{ $wifi_bills_diff }} Days)
                                @else
                                ({{ abs($wifi_bills_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>
                    <td>
                        @php
                        $sewerage_bills_diff = \Carbon\Carbon::parse($item->sewerage_bills)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $sewerage_bills_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->sewerage_bills }}
                            <br>
                            <strong>
                                @if($sewerage_bills_diff > 0)
                                (-{{ $sewerage_bills_diff }} Days)
                                @else
                                ({{ abs($sewerage_bills_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>
                    <td>
                        @php
                        $mobile_bills_diff = \Carbon\Carbon::parse($item->mobile_bills)->diffInDays(now(), false);
                        @endphp

                        <div class="{{ $mobile_bills_diff > 0 ? 'text-danger' : '' }}">
                            {{ $item->mobile_bills }}
                            <br>
                            <strong>
                                @if($mobile_bills_diff > 0)
                                (-{{ $mobile_bills_diff }} Days)
                                @else
                                ({{ abs($mobile_bills_diff) }} Days)
                                @endif
                            </strong>
                        </div>
                    </td>

                    <td>
                        <a href="{{ route('company.edit', $item->id) }}" wire:navigate class="btn btn-primary btn-sm">
                            <i class="ri-edit-line"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" wire:click="confirmDelete({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center">No results found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

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