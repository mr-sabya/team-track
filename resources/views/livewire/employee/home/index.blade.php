<div class="row">
    <div class="col-lg-8">
        <div class="row">
            {{-- Because she competes with no one, no one can compete with her. --}}

            <div class="col-lg-12">

                <div class="card bg-profile-header text-center py-5">

                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-7">
                            <div class="d-flex flex-column align-items-center">
                                <!-- Conditional Profile Image -->

                                <div class="image">
                                    <img
                                        id="profile-preview"
                                        src="{{ $employee->image ? asset('storage/' . $employee->image) : url('assets/images/man-user-color-icon.svg') }}"
                                        alt="Profile Picture"
                                        class="profile-img">
                                    <a href="javascript:void(0)" wire:click="$set('showForm', true)" class="change-button">
                                        <i class="ri-pencil-line"></i> Change Picture
                                    </a>
                                </div>
                            </div>
                            <h2 class="mt-3 text-white">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                            <p class="mb-1">{{ $employee->company['name'] }}</p>
                        </div>
                        @if ($showForm)
                        <div class="col-lg-5">
                            <div class="px-5">
                                <form wire:submit.prevent="updateProfilePicture" enctype="multipart/form-data">
                                    <div class="">
                                        <label for="profileImage" class="form-label">Select Profile Image <span wire:loading wire:target="image" class="text-white">
                                                Uploading...
                                            </span>
                                        </label>
                                        <input
                                            type="file"
                                            class="form-control d-none"
                                            id="profileImage"
                                            wire:model="image"
                                            accept="image/*"
                                            onchange="previewImage(event)">
                                    </div>


                                    @if ($image)
                                    <!-- Image preview for uploaded image -->
                                    <div class="mb-3 text-center ">
                                        <label for="profileImage" class="image-uploader">
                                            <img
                                                id="image-preview"
                                                src="{{ $image->temporaryUrl() }}"
                                                alt="Image Preview"
                                                class="img-thumbnail"
                                                style="max-width: 150px;">
                                            <div class="uploader">Upload Image</div>
                                        </label>
                                    </div>
                                    @else
                                    <!-- Default image if no image is uploaded -->
                                    <div class="mb-3 text-center">
                                        <label for="profileImage" class="image-uploader">
                                            <img
                                                id="image-preview"
                                                src="{{ $employee->image ? asset('storage/' . $employee->image) : url('assets/images/man-user-color-icon.svg') }}"
                                                alt="Profile Picture"
                                                class="img-thumbnail"
                                                style="max-width: 150px;">
                                            <div class="uploader">Upload Image</div>
                                        </label>
                                    </div>
                                    @endif

                                    <div class="d-flex gap-3">
                                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                                        <button type="button" wire:click="$set('showForm', false)" class="btn btn-secondary w-100">Cancel</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        @endif
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
                            <li><strong>Country:</strong> {{ $employee->country['name'] ?? 'N/A' }}</li>
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
    </div>
</div>


<script>
    // JavaScript for Image Preview
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>