<?php

namespace App\Livewire\Backup;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DatabaseBackup extends Component
{

    use WithFileUploads;

    public $backups = [];
    public $isBackingUp = false;
    public $restoreFile;

    public function mount()
    {
        $this->loadBackups();
    }

    public function loadBackups()
    {
        $this->backups = Storage::disk('local')->files('Laravel');
    }

    public function createBackup()
    {
        try {
            $this->isBackingUp = true;

            $command = 'php ' . base_path('artisan') . ' backup:run';
            $output = shell_exec($command);

            // Check if the backup was successful
            if ($output) {
                $this->dispatch('alert', ['type' => 'success',  'message' => 'Backup created successfully!']);
            } else {
                $this->dispatch('alert', ['type' => 'success',  'message' => 'Backup Failed!']);
            }
        } catch (\Exception $e) {
            $this->dispatch('alert', ['type' => 'success',  'message' => 'Backup Failed!' . $e->getMessage()]);
        } finally {
            $this->isBackingUp = false;  // Set status to false when backup finishes
            $this->loadBackups();
        }
    }

    public function downloadBackup($file)
    {
        if (Storage::exists($file)) {
            return Storage::download($file);
        }

        session()->flash('error', 'File does not exist!');
    }

    public function deleteBackup($file)
    {
        Storage::disk('local')->delete($file);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Backup deleted successfully!',
        ]);

        $this->loadBackups();
    }

    public function restoreBackup()
    {
        $this->validate([
            'restoreFile' => 'required|file|max:51200', // Max file size in KB (50MB)
        ]);

        $path = $this->restoreFile->storeAs('Laravel', $this->restoreFile->getClientOriginalName(), 'local');

        try {
            $restoreFilePath = storage_path('app/' . $path);
            Artisan::call('db:restore', [
                '--file' => $restoreFilePath,
            ]);

            $this->restoreFile = '';

            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Backup restored successfully!',
            ]);
        } catch (\Exception $e) {
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Restore failed: ' . $e->getMessage(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.backup.database-backup');
    }
}
