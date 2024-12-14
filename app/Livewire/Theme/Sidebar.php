<?php

namespace App\Livewire\Theme;

use App\Models\Company;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.theme.sidebar',[
            'companies' => Company::orderBy('name', 'ASC')->get(),
        ]);
    }
}
