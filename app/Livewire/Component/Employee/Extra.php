<?php

namespace App\Livewire\Component\Employee;

use App\Models\UserExtra;
use Livewire\Component;

class Extra extends Component
{
    public $userId; // User ID to mount
    public $userExtras; // List of UserExtras
    public $name, $text, $userExtraId;

    protected $rules = [
        'name' => 'required|string|max:255',
        'text' => 'required|string',
    ];

    public function mount($id)
    {
        $this->userId = $id;
        $this->loadUserExtras();
    }

    public function loadUserExtras()
    {
        $this->userExtras = UserExtra::where('user_id', $this->userId)->get();
    }

    public function create()
    {
        $this->validate();
        UserExtra::create([
            'user_id' => $this->userId,
            'name' => $this->name,
            'text' => $this->text,
        ]);

        $this->resetFields();
        $this->loadUserExtras();

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Extra Info created successfully!']);
    }

    public function edit($id)
    {
        $userExtra = UserExtra::findOrFail($id);
        $this->userExtraId = $userExtra->id;
        $this->name = $userExtra->name;
        $this->text = $userExtra->text;
    }

    public function update()
    {
        $this->validate();

        $userExtra = UserExtra::findOrFail($this->userExtraId);
        $userExtra->update([
            'name' => $this->name,
            'text' => $this->text,
        ]);

        $this->resetFields();
        $this->loadUserExtras();

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Extra Info has been updated successfully!']);
    }

    public function delete($id)
    {
        UserExtra::findOrFail($id)->delete();
        $this->loadUserExtras();

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Extra Info has been deleted successfully!']);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->text = '';
        $this->userExtraId = null;
    }

    
    public function render()
    {
        return view('livewire.component.employee.extra');
    }
}
