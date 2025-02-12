<div class="row">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Notification Settings</h4>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                <form wire:submit.prevent="updateSettings">
                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" wire:model="email">
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Notification Type Field -->
                    <div class="mb-3">
                        <label class="form-label">Notification Type</label>
                        <select class="form-select" wire:model="notification_type">
                            <option value="email">Email</option>
                            <option value="sms">SMS</option>
                            <option value="push">Push Notification</option>
                            <option value="in_app">In-App</option>
                        </select>
                        @error('notification_type') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Notification Frequency Field -->
                    <div class="mb-3">
                        <label class="form-label">Notification Frequency</label>
                        <select class="form-select" wire:model="notification_frequency">
                            <option value="immediate">Immediate</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                        @error('notification_frequency') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Days Before Expiry Field -->
                    <div class="mb-3">
                        <label for="days" class="form-label">Days Before Expiry to Notify</label>
                        <input type="number" class="form-control" id="days" wire:model="days" min="1">
                        @error('days') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Enable Notifications Field -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" wire:model="is_enabled">
                        <label class="form-check-label" for="is_enabled">Enable Notifications</label>
                    </div>

                    <!-- Notify on New Message -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" wire:model="notify_on_new_message">
                        <label class="form-check-label" for="notify_on_new_message">Notify on New Message</label>
                    </div>

                    <!-- Notify on Comment -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" wire:model="notify_on_comment">
                        <label class="form-check-label" for="notify_on_comment">Notify on Comment</label>
                    </div>

                    <!-- Notify on System Alert -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" wire:model="notify_on_system_alert">
                        <label class="form-check-label" for="notify_on_system_alert">Notify on System Alert</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </div>

</div>