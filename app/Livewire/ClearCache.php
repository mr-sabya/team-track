<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class ClearCache extends Component
{
    public $message = null;

    public function clearCache()
    {
        try {
            // Clear application cache
            Artisan::call('cache:clear');

            // Clear route cache
            Artisan::call('route:clear');

            // Clear config cache
            Artisan::call('config:clear');

            // Clear view cache
            Artisan::call('view:clear');

            // Optionally clear compiled classes and services
            Artisan::call('optimize:clear');

            // Optionally, you can also run a cache:clear via Cache facade
            // Cache::flush(); // Clears all cache

            // Show a success message
            $this->message = 'All caches (app, config, route, and view) have been cleared successfully!';
        } catch (\Exception $e) {
            $this->message = 'An error occurred while clearing the cache: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.clear-cache');
    }
}
