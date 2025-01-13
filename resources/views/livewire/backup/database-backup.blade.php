<div>
    <div class="d-flex justify-content-between mb-3">
        <h3>Database Backups</h3>
        <div>
            <button class="btn btn-primary" wire:click="createBackup" wire:loading.attr="disabled">
                @if($isBackingUp)
                Creating Backup...
                @else
                Create Backup
                @endif
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