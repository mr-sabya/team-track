<div>
    <form wire:submit.prevent="submit" class="needs-validation">

        <div class="mb-3">
            <label for="for_company" class="form-label">For Company:</label>
            <div class="form-check form-switch">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="for_company"
                    wire:model="forCompany"
                    wire:click="toggleForCompany" />
                <span>{{ $forCompany ? 'Yes' : 'No' }}</span>
            </div>
        </div>

        @if($forCompany)
        <div class="form-group mb-3">
            <label for="company_id">Compnay</label>
            <select id="company_id" wire:model="company_id" class="form-control">
                <option value="">-- Select Company --</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        @endif

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

        @if(!$forCompany)

        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select id="role" wire:model="role" class="form-control">
                <option value="">-- Select Role --</option>
                @foreach ($roles as $roleName)
                <option value="{{ $roleName }}">{{ $roleName }}</option>
                @endforeach
            </select>
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" id="is_superadmin" class="form-check-input" wire:model.defer="is_superadmin">
            <label for="is_superadmin" class="form-check-label">Make Super Admin</label>
        </div>
        @endif

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