<div>

    <form wire:submit.prevent="submit" class="needs-validation">


        <div class="row">

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" wire:model.defer="first_name">
                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>