<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3>Company Profile ({{ $company->name }})</h3>
            </div>
            <div class="card-body">

               
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- Trade License -->
                            @php
                            $trade_license_diff = \Carbon\Carbon::parse($company->trade_license)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $trade_license_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="trade_license" class="form-label">Trade License</label>
                                    <br>
                                    {{ $company->trade_license }}
                                    <strong>
                                        @if($trade_license_diff > 0)
                                        (-{{ $trade_license_diff }} Days)
                                        @else
                                        ({{ abs($trade_license_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- Establishment Card -->
                            @php
                            $establishment_card_diff = \Carbon\Carbon::parse($company->establishment_card)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $establishment_card_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="establishment_card" class="form-label">Establishment Card</label>
                                    <br>
                                    {{ $company->establishment_card }}
                                    <strong>
                                        @if($establishment_card_diff > 0)
                                        (-{{ $establishment_card_diff }} Days)
                                        @else
                                        ({{ abs($establishment_card_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- Vehicle -->
                            @php
                            $vehicle_diff = \Carbon\Carbon::parse($company->vehicle)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $vehicle_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="vehicle" class="form-label">Vehicle</label>
                                    <br>
                                    {{ $company->vehicle }}
                                    <strong>
                                        @if($vehicle_diff > 0)
                                        (-{{ $vehicle_diff }} Days)
                                        @else
                                        ({{ abs($vehicle_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- Domain Subscriptions -->
                            @php
                            $domain_subscriptions_diff = \Carbon\Carbon::parse($company->domain_subscriptions)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $domain_subscriptions_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="domain_subscriptions" class="form-label">Domain Subscriptions</label>
                                    <br>
                                    {{ $company->domain_subscriptions }}
                                    <strong>
                                        @if($domain_subscriptions_diff > 0)
                                        (-{{ $domain_subscriptions_diff }} Days)
                                        @else
                                        ({{ abs($domain_subscriptions_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- Tenancy Agreement -->
                            @php
                            $tenancy_agreement_diff = \Carbon\Carbon::parse($company->tenancy_agreement)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $tenancy_agreement_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="tenancy_agreement" class="form-label">Tenancy Agreement</label>
                                    <br>
                                    {{ $company->tenancy_agreement }}
                                    <strong>
                                        @if($tenancy_agreement_diff > 0)
                                        (-{{ $tenancy_agreement_diff }} Days)
                                        @else
                                        ({{ abs($tenancy_agreement_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- Electricity Bills -->
                            @php
                            $electricity_bills_diff = \Carbon\Carbon::parse($company->electricity_bills)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $electricity_bills_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="electricity_bills" class="form-label">Electricity Bills</label>
                                    <br>
                                    {{ $company->electricity_bills }}
                                    <strong>
                                        @if($electricity_bills_diff > 0)
                                        (-{{ $electricity_bills_diff }} Days)
                                        @else
                                        ({{ abs($electricity_bills_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- WiFi Bills -->
                            @php
                            $wifi_bills_diff = \Carbon\Carbon::parse($company->wifi_bills)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $wifi_bills_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="wifi_bills" class="form-label">WiFi Bills</label>
                                    <br>
                                    {{ $company->wifi_bills }}
                                    <strong>
                                        @if($wifi_bills_diff > 0)
                                        (-{{ $wifi_bills_diff }} Days)
                                        @else
                                        ({{ abs($wifi_bills_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">
                            <!-- Sewerage Bills -->
                            @php
                            $sewerage_bills_diff = \Carbon\Carbon::parse($company->sewerage_bills)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $sewerage_bills_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="sewerage_bills" class="form-label">Sewerage Bills</label>
                                    <br>
                                    {{ $company->sewerage_bills }}
                                    <strong>
                                        @if($sewerage_bills_diff > 0)
                                        (-{{ $sewerage_bills_diff }} Days)
                                        @else
                                        ({{ abs($sewerage_bills_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="border p-4">

                            <!-- Mobile Bills -->
                            @php
                            $mobile_bills_diff = \Carbon\Carbon::parse($company->mobile_bills)->diffInDays(now(), false);
                            @endphp
                            <div class="{{ $mobile_bills_diff > 0 ? 'text-danger' : '' }}">
                                <p class="m-0">
                                    <label for="mobile_bills" class="form-label">Mobile Bills</label>
                                    <br>
                                    {{ $company->mobile_bills }}
                                    <strong>
                                        @if($mobile_bills_diff > 0)
                                        (-{{ $mobile_bills_diff }} Days)
                                        @else
                                        ({{ abs($mobile_bills_diff) }} Days)
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3>Update Company Profile</h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <!-- Column 1 -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" wire:model.defer="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="trade_license" class="form-label">Trade License</label>
                                <input type="date" id="trade_license" class="form-control" wire:model.defer="trade_license">
                                @error('trade_license') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="establishment_card" class="form-label">Establishment Card</label>
                                <input type="date" id="establishment_card" class="form-control" wire:model.defer="establishment_card">
                                @error('establishment_card') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="vehicle" class="form-label">Vehicle</label>
                                <input type="date" id="vehicle" class="form-control" wire:model.defer="vehicle">
                                @error('vehicle') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="domain_subscriptions" class="form-label">Domain Subscriptions</label>
                                <input type="date" id="domain_subscriptions" class="form-control" wire:model.defer="domain_subscriptions">
                                @error('domain_subscriptions') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tenancy_agreement" class="form-label">Tenancy Agreement</label>
                                <input type="date" id="tenancy_agreement" class="form-control" wire:model.defer="tenancy_agreement">
                                @error('tenancy_agreement') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="electricity_bills" class="form-label">Electricity Bills</label>
                                <input type="date" id="electricity_bills" class="form-control" wire:model.defer="electricity_bills">
                                @error('electricity_bills') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="wifi_bills" class="form-label">WiFi Bills</label>
                                <input type="date" id="wifi_bills" class="form-control" wire:model.defer="wifi_bills">
                                @error('wifi_bills') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sewerage_bills" class="form-label">Sewerage Bills</label>
                                <input type="date" id="sewerage_bills" class="form-control" wire:model.defer="sewerage_bills">
                                @error('sewerage_bills') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mobile_bills" class="form-label">Mobile Bills</label>
                                <input type="date" id="mobile_bills" class="form-control" wire:model.defer="mobile_bills">
                                @error('mobile_bills') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="submit"
                        class="btn btn-primary">
                        <span wire:loading.remove wire:target="submit">Save</span>
                        <span wire:loading wire:target="submit">Saving...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>