<div>
    <form wire:submit.prevent="update">
        <div class="row">
            <!-- General Fields -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control" wire:model.defer="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" wire:model.defer="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" class="form-control" wire:model.defer="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" id="address" class="form-control" wire:model.defer="address">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="salution" class="form-label">Salutation</label>
                    <input type="text" id="salution" class="form-control" wire:model.defer="salution">
                    @error('salution') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Logo Upload -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Logo</label>
                    <div>
                        @if ($newLogo)
                        <img src="{{ $newLogo->temporaryUrl() }}" alt="New Logo" class="img-thumbnail" width="150">
                        @elseif ($currentLogo)
                        <img src="{{ Storage::url($currentLogo) }}" alt="Current Logo" class="img-thumbnail" width="150">
                        @else
                        <span>No Logo Available</span>
                        @endif
                    </div>
                    <input type="file" class="form-control mt-2" wire:model="newLogo">
                    @error('newLogo') <span class="text-danger">{{ $message }}</span> @enderror
                    <button type="button" class="btn btn-secondary mt-2" wire:click="resetLogo">Reset Logo</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
</div>