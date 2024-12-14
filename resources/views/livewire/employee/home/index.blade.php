<div class="row">

    <div class="col-lg-8">
        <div class="row">
            {{-- Because she competes with no one, no one can compete with her. --}}

            <div class="col-lg-12">
                <div class="card bg-profile-header text-center py-5">
                    <div class="d-flex flex-column align-items-center">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-img">
                        <h2 class="mt-3">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                        <p class="mb-1">{{ $employee->company['name'] }}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> {{ $employee->email }}</li>
                            <li><strong>Phone:</strong> {{ $employee->phone }}</li>
                            <li><strong>Date Of Birth:</strong> {{ $employee->date_of_birth }}</li>
                            <li><strong>Gender:</strong>
                                @if($employee->gender == 1)
                                Male
                                @elseif($employee->gender == 2)
                                Female
                                @else
                                Other
                                @endif
                            </li>
                            <li><strong>Address:</strong> {{ $employee->address }}</li>
                            <li><strong>Country:</strong> {{ $employee->country['name'] }}</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Expiry Dates</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>
                                <strong>Visa:</strong>
                                @php
                                $visa_diff = \Carbon\Carbon::parse($employee->visa['expiry_date'])->diffInDays(now(), false);
                                @endphp

                                <span class="{{ $visa_diff > 0 ? 'text-danger' : '' }}">
                                    {{ $employee->visa['expiry_date'] }}
                                    <strong>
                                        @if($visa_diff > 0)
                                        (-{{ $visa_diff }} Days)
                                        @else
                                        ({{ abs($visa_diff) }} Days)
                                        @endif
                                    </strong>
                                </span>
                            </li>

                            <li>
                                <strong>Passport:</strong>
                                @php
                                $passport_diff = \Carbon\Carbon::parse($employee->passport['expiry_date'])->diffInDays(now(), false);
                                @endphp

                                <span class="{{ $passport_diff > 0 ? 'text-danger' : '' }}">
                                    {{ $employee->passport['expiry_date'] }}
                                    <strong>
                                        @if($passport_diff > 0)
                                        (-{{ $passport_diff }} Days)
                                        @else
                                        ({{ abs($passport_diff) }} Days)
                                        @endif
                                    </strong>
                                </span>
                            </li>

                            <li>
                                <strong>Vehicle:</strong>
                                @php
                                $vehicle_diff = \Carbon\Carbon::parse($employee->vehicle['expiry_date'])->diffInDays(now(), false);
                                @endphp

                                <span class="{{ $vehicle_diff > 0 ? 'text-danger' : '' }}">
                                    {{ $employee->vehicle['expiry_date'] }}
                                    <strong>
                                        @if($vehicle_diff > 0)
                                        (-{{ $vehicle_diff }} Days)
                                        @else
                                        ({{ abs($vehicle_diff) }} Days)
                                        @endif
                                    </strong>
                                </span>
                            </li>

                            <li>
                                <strong>Driving License:</strong>
                                @php
                                $drivingLicense_diff = \Carbon\Carbon::parse($employee->drivingLicense['expiry_date'])->diffInDays(now(), false);
                                @endphp

                                <span class="{{ $drivingLicense_diff > 0 ? 'text-danger' : '' }}">
                                    {{ $employee->drivingLicense['expiry_date'] }}
                                    <strong>
                                        @if($drivingLicense_diff > 0)
                                        (-{{ $drivingLicense_diff }} Days)
                                        @else
                                        ({{ abs($drivingLicense_diff) }} Days)
                                        @endif
                                    </strong>
                                </span>
                            </li>

                            <li>
                                <strong>Emirates ID:</strong>
                                @php
                                $emiratesInfo_diff = \Carbon\Carbon::parse($employee->emiratesInfo['expiry_date'])->diffInDays(now(), false);
                                @endphp

                                <span class="{{ $emiratesInfo_diff > 0 ? 'text-danger' : '' }}">
                                    {{ $employee->emiratesInfo['expiry_date'] }}
                                    <strong>
                                        @if($emiratesInfo_diff > 0)
                                        (-{{ $emiratesInfo_diff }} Days)
                                        @else
                                        ({{ abs($emiratesInfo_diff) }} Days)
                                        @endif
                                    </strong>
                                </span>
                            </li>

                            <li>
                                <strong>Insurance:</strong>
                                @php
                                $insuranceInfo_diff = \Carbon\Carbon::parse($employee->insuranceInfo['expiry_date'])->diffInDays(now(), false);
                                @endphp

                                <span class="{{ $insuranceInfo_diff > 0 ? 'text-danger' : '' }}">
                                    {{ $employee->insuranceInfo['expiry_date'] }}
                                    <strong>
                                        @if($insuranceInfo_diff > 0)
                                        (-{{ $insuranceInfo_diff }} Days)
                                        @else
                                        ({{ abs($insuranceInfo_diff) }} Days)
                                        @endif
                                    </strong>
                                </span>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Details -->

    </div>
</div>