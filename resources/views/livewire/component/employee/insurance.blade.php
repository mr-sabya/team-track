<div>

    <form wire:submit.prevent="submit" class="needs-validation">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="insurance_no" class="form-label">Insurance No</label>
                    <input type="text" id="insurance_no" class="form-control @error('insurance_no') is-invalid @enderror" wire:model.defer="insurance_no">
                    @error('insurance_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label">Insurance Type</label>
                    <select id="type_id" class="form-control @error('type_id') is-invalid @enderror" wire:model.defer="type_id">
                        <option value="">Select Type</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                    @error('type_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" wire:model.defer="expiry_date">
                    @error('expiry_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <label class="form-label">Insurance
                    <span wire:loading wire:target="image" class="text-muted">
                        Uploading...
                    </span>
                </label>


                <div class="image">
                    @if($image)
                    <button type="button" wire:click="clearImage" class="btn btn-primary btn-sm">Clear</button>
                    <img src="{{ $image->temporaryUrl() }}" alt="">
                    @endif
                    @if($existingImage)
                    <img src="{{ url('storage', $existingImage) }}" alt="">
                    @endif
                </div>
                <div class="mb-3 mt-2">
                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" wire:model.defer="image" wire:change="handleChange">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
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