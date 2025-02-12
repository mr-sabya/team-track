<div class="">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-header bg-danger text-white text-center">
                    <h4 class="mb-0">Change Password</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6">
                            @if (session()->has('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                            @endif

                            <form wire:submit.prevent="updatePassword">
                                <!-- Current Password -->
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" id="current_password" wire:model="current_password" class="form-control" placeholder="Enter current password">
                                    @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- New Password -->
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" id="new_password" wire:model="new_password" class="form-control" placeholder="Enter new password">
                                    @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Confirm New Password -->
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation" class="form-control" placeholder="Re-enter new password">
                                    @error('new_password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class=" mt-4">
                                    <button type="submit" class="btn btn-danger px-4">
                                        <i class="bi bi-shield-lock-fill me-2"></i> Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>