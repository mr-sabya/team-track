<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Change Password</h5>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form wire:submit.prevent="updatePassword">
                    <!-- Current Password -->
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" id="current_password" wire:model="current_password"
                            class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" id="new_password" wire:model="new_password"
                            class="form-control @error('new_password') is-invalid @enderror">
                        @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation"
                            class="form-control">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>

    </div>
</div>