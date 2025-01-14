<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <!-- Button to create a backup -->
                        <button class="btn btn-primary" wire:click="createBackup" wire:loading.attr="disabled">
                            <span wire:loading wire:target="createBackup">Creating Backup...</span>
                            <span wire:loading.remove wire:target="createBackup">Create Backup</span>
                        </button>
                        <div wire:loading wire:target="createBackup" style="height: 34px;">
                            <img src="{{ url('assets/images/loading.gif') }}" alt="" style="height: 100%;">
                        </div>
                    </div>

                    <!-- List of backups -->
                    <h4 class="mt-4">Available Backups</h4>
                    <ul class="list-group">
                        @forelse($backups as $backup)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ basename($backup) }}
                            <div>
                                <button class="btn btn-primary btn-sm" wire:click="downloadBackup('{{ $backup }}')">
                                    Download
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click="deleteBackup('{{ $backup }}')">
                                    Delete
                                </button>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            No backups available
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <!-- Restore Backup -->
                    <h4 class="">Restore Backup</h4>
                    <form wire:submit.prevent="restoreBackup">
                        <div class="form-group">
                            <input type="file" class="form-control" wire:model="restoreFile" accept=".sql">
                            @error('restoreFile') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" wire:loading.attr="disabled">
                            <span wire:loading wire:target="restoreBackup">Restoring...</span>
                            <span wire:loading.remove wire:target="restoreBackup">Restore Backup</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>