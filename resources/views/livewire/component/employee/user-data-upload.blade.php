<!-- resources/views/livewire/user-data-upload.blade.php -->
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="border p-5">
            <div>
                <form wire:submit.prevent="upload">

                    <div class="form-group mb-3">
                        <label for="file">Upload File</label>
                        <input type="file" wire:model="file" class="form-control">
                        <span>**Upload csv/xlsx file</span>
                        @error('file') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Upload</button>
                    <a href="{{ route('employee.download-demo-excel') }}" class="btn btn-dark w-100 mb-3">Download Demo XLSX</a>
                    <a href="{{ route('employee.download-demo-csv') }}" class="btn btn-dark w-100">Download Demo CSV</a>
                </form>

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