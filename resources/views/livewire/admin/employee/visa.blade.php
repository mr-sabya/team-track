<div>

    <form wire:submit.prevent="submit" class="needs-validation">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="issue_date" class="form-label">Issue Date</label>
                    <input type="date" id="issue_date" class="form-control @error('issue_date') is-invalid @enderror" wire:model.defer="issue_date">
                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" wire:model.defer="expiry_date">
                    @error('expiry_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="image">
                    @if($image)
                    <button type="button" wire:click="clearImage" class="btn btn-primary btn-sm">Clear</button>
                    <img src="{{ $image->temporaryUrl() }}" alt="">
                    @endif
                    @if($existingImage)
                    <img src="{{ url('storage.', $existingImage) }}" alt="">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Visa</label>
                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" wire:model.defer="image" wire:change="handleChange">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>