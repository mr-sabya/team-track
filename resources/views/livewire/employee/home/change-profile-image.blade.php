<div class="modal fade" id="profileImageModal" tabindex="-1" aria-labelledby="profileImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileImageModalLabel">Change Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form wire:submit.prevent="updateProfilePicture" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="profileImage" class="form-label">Select New Profile Image</label>
                        <input
                            type="file"
                            class="form-control"
                            id="profileImage"
                            wire:model="image"
                            accept="image/*"
                            onchange="previewImage(event)">
                    </div>

                    @if ($image)
                    <div class="mb-3 text-center">
                        <img
                            id="image-preview"
                            src="{{ $image->temporaryUrl() }}"
                            alt="Image Preview"
                            class="img-thumbnail"
                            style="max-width: 200px;">
                    </div>
                    @else
                    <div class="mb-3 text-center">
                        <img
                            id="image-preview"
                            src="{{ url('assets/images/man-user-color-icon.svg') }}"
                            alt="Image Preview"
                            class="img-thumbnail"
                            style="max-width: 200px;">
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
