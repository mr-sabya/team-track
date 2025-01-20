<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $showModal = false;
    public $modelId = null;
    public $modelType = null;
    public $modalTitle = null;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal($modelType, $modelId, $modalTitle)
    {
        $this->modelId = $modelId;
        $this->modelType = $modelType;
        $this->modalTitle = $modalTitle;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deleteModel()
    {
        // Handle deletion logic
        if ($this->modelType && $this->modelId) {
            $modelClass = 'App\\Models\\' . $this->modelType;
            $model = $modelClass::find($this->modelId);
            if ($model) {
                $model->delete();
                // Dispatch the event to notify parent component
                $this->dispatch('modelDeleted');
            }
        }

        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.modal');
    }
}
