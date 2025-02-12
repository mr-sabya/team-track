<div class="">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Update Profile</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="text-center mb-4">
                        <!-- Profile Image -->
                        <div class="position-relative d-inline-block">
                            @if ($new_image)
                            <img src="{{ $new_image->temporaryUrl() }}" alt="Preview" class="rounded-circle img-thumbnail shadow" width="120" height="120">
                            @elseif ($image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Profile Image" class="rounded-circle img-thumbnail shadow" width="120" height="120">
                            @else
                            <img src="{{ url('assets/images/man-user-color-icon.svg') }}" alt="Default Image" class="rounded-circle img-thumbnail shadow" width="120" height="120">
                            @endif
                            <label class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle shadow" style="cursor: pointer;">
                                <i class="ri-pencil-line"></i>
                                <input type="file" id="new_image" wire:model="new_image" class="d-none">
                            </label>
                        </div>
                        @error('new_image') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror
                    </div>

                    <form wire:submit.prevent="updateProfile">
                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" id="first_name" wire:model="first_name" class="form-control">
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" id="last_name" wire:model="last_name" class="form-control">
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" wire:model="email" class="form-control">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" wire:model="phone" class="form-control">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <!-- Country -->
                            <div class="col-md-6">
                                <label for="country_id" class="form-label">Country</label>
                                <select id="country_id" wire:model="country_id" class="form-select">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Gender -->
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" wire:model="gender" class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                </select>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" id="date_of_birth" wire:model="date_of_birth" class="form-control">
                                @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Address -->
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" wire:model="address" class="form-control" rows="2"></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class=" mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-save-fill me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>