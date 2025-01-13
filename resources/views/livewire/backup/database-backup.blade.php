<div>
    <div class="d-flex justify-content-between mb-3">
        <h3>Database Backups</h3>
        <button class="btn btn-primary" wire:click="createBackup">Create Backup</button>
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