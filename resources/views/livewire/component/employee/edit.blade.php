<div>

    <form wire:submit.prevent="submit" class="needs-validation">

        @if($companyId == '')
        <div class="row border-bottom mb-3">
            <div class="col-lg-6">
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
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" wire:model.defer="first_name">
                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" wire:model.defer="last_name">
                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Conatct No</label>
                    <input type="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" wire:model.defer="phone">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select type="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" wire:model.defer="gender">
                        <option value="">Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                    @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>


            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date Of Birth</label>
                    <input type="date" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" wire:model.defer="date_of_birth">
                    @error('date_of_birth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" wire:model.defer="address">
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-lg-6">

                <div class="mb-3">
                    <label for="country_id" class="form-label">Country</label>
                    <select id="country_id" class="form-control @error('country_id') is-invalid @enderror" wire:model.defer="country_id">
                        <option value="" selected>Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

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