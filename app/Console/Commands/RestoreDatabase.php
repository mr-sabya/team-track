<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RestoreDatabase extends Command
{
    protected $signature = 'db:restore {--file=}';
    protected $description = 'Restore the database from a SQL file';

    public function handle()
    {
        $file = $this->option('file');

        if (!file_exists($file)) {
            $this->error('File not found: ' . $file);
            return 1;
        }

        try {
            $sql = file_get_contents($file);
            DB::unprepared($sql);
            $this->info('Database restored successfully!');
        } catch (\Exception $e) {
            $this->error('Restore failed: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
