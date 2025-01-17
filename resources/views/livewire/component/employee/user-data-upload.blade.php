<!-- resources/views/livewire/user-data-upload.blade.php -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="border p-5">
            <div>
                <form wire:submit.prevent="uploadData" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        @if (!$companyId)
                        <label for="companyId">Select Company</label>
                        <select wire:model="companyId" id="companyId" class="form-control">
                            <option value="">-- Select a Company --</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('companyId') <span class="text-danger">{{ $message }}</span> @enderror
                        @else
                        <p><strong>Company ID:</strong> {{ $companyId }}</p>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="file">Upload File</label>
                        <input type="file" wire:model="file" class="form-control" name="file">
                        <span>**Upload csv/xlsx file</span>
                        @error('file') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3" wire:loading.attr="disabled">
                        <!-- Show spinner when uploading -->
                        <span wire:loading.remove>Upload</span>
                        <span wire:loading>
                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                <span class="sr-only">Uploading...</span>
                            </div>
                            Uploading...
                        </span>
                    </button>
                </form>
                <a href="{{ route('download-demo-excel') }}" class="btn btn-dark w-100 mb-3">Download Demo XLSX</a>
                <a href="{{ route('download-demo-csv') }}" class="btn btn-dark w-100">Download Demo CSV</a>

                @if (session()->has('message'))
                <div>{{ session('message') }}</div>
                @endif

                @if (session()->has('error'))
                <div>{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>