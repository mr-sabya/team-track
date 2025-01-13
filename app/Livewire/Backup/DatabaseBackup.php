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

    public $backups = [];
    public $isBackingUp = false;  // Property to track backup status

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
        }

        $this->loadBackups();
    }

    public function downloadBackup($file)
    {
        if (Storage::disk('local')->exists($file)) {
            return response()->streamDownload(function () use ($file) {
                echo Storage::disk('local')->get($file);
            }, basename($file));
        } else {
            session()->flash('error', 'File does not exist!');
        }
    }

    public function deleteBackup($file)
    {
        Storage::disk('local')->delete($file);
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Backup deleted successfully!']);

        $this->loadBackups();
    }

    public function render()
    {
        return view('livewire.backup.database-backup');
    }
}
