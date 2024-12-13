<div>
    <form wire:submit.prevent="submit" class="needs-validation">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" wire:model.defer="first_name">
            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" wire:model.defer="last_name">
            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" wire:model.defer="phone">
            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" wire:model.defer="password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" wire:model.defer="confirm_password">
            @error('confirm_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" id="is_superadmin" class="form-check-input" wire:model.defer="is_superadmin">
            <label for="is_superadmin" class="form-check-label">Make Admin</label>
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