<div>
    <form wire:submit.prevent="submit" class="needs-validation">



        <div class="mb-3">
            <label for="company_id" class="form-label">Company</label>
            <select id="company_id" class="form-control @error('company_id') is-invalid @enderror" wire:model.defer="company_id">
                <option value="" selected>Select Company</option>
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

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
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" wire:model.defer="address">
            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date Of Birth</label>
            <input type="date" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" wire:model.defer="date_of_birth">
            @error('date_of_birth') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <hr>
        
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>