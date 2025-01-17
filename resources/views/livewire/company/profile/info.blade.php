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