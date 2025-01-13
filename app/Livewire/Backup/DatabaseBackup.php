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

    public function mount()
    {
        $this->loadBackups();
    }

    public function loadBackups()
    {
        $this->backups = Storage::disk('local')->files('laravel-backups');
    }

    public function createBackup()
    {
        try {
            Artisan::queue('backup:run', ['--only-db' => true]);
            dd(Artisan::output());
            session()->flash('success', 'Backup created successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Backup failed: ' . $e->getMessage());
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
        session()->flash('success', 'Backup deleted successfully!');
        $this->loadBackups();
    }

    public function render()
    {
        return view('livewire.backup.database-backup');
    }
}
