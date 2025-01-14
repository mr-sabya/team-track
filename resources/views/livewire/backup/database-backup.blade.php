<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <!-- Button to create a backup -->
                    <button class="btn btn-primary" wire:click="createBackup" wire:loading.attr="disabled">
                        <span wire:loading wire:target="createBackup">Creating Backup...</span>
                        <span wire:loading.remove wire:target="createBackup">Create Backup</span>
                    </button>

                    <!-- List of backups -->
                    <h4 class="mt-4">Available Backups</h4>
                    <ul class="list-group">
                        @foreach($backups as $backup)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ basename($backup) }}
        <div>
                                <button class="btn btn-success btn-sm" wire:click="downloadBackup('{{ $backup }}')">
                                    Download
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click="deleteBackup('{{ $backup }}')">
                                    Delete
                                </button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <!-- Restore Backup -->
                    <h4 class="mt-4">Restore Backup</h4>
                    <form wire:submit.prevent="restoreBackup">
                        <div class="form-group">
                            <input type="file" class="form-control" wire:model="restoreFile" accept=".sql">
                            @error('restoreFile') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-warning mt-2" wire:loading.attr="disabled">
                            <span wire:loading wire:target="restoreBackup">Restoring...</span>
                            <span wire:loading.remove wire:target="restoreBackup">Restore Backup</span>
            </button>
            <div wire:loading wire:target="createBackup" style="height: 34px;">
                <img src="{{ url('assets/images/loading.gif') }}" alt="" style="height: 100%;">
            </div>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Backup File</th>
                <th>Size</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($backups as $index => $backup)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $backup }}</td>
                <td>{{ Storage::disk('local')->size($backup) / 1024 }} KB</td>
                <td>{{ \Carbon\Carbon::createFromTimestamp(Storage::disk('local')->lastModified($backup))->toDateTimeString() }}</td>
                <td>
                    <button class="btn btn-sm btn-success" wire:click="downloadBackup('{{ $backup }}')">Download</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteBackup('{{ $backup }}')">Delete</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No backups found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>