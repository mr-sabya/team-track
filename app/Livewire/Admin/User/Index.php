<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $sortField = 'id'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    public $perPage = 10; // Items per page
    public $deleteId = null; // Holds the ID of the record to delete

    protected $queryString = ['search', 'sortField', 'sortDirection', 'perPage'];

    protected $listeners = ['userCreated' => 'refreshUsers'];

    public function refreshUsers()
    {
        // Re-fetch or refresh the data
        $this->render();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }


    public function confirmDelete($id)
    {
        $this->deleteId = $id; // Set the record to be deleted
    }

    public function delete()
    {
        if ($this->deleteId) {
            User::findOrFail($this->deleteId)->delete(); // Replace User with your model
            $this->deleteId = null;
            $this->dispatch('updateTrashCount');
            $this->dispatch('alert', ['type' => 'success',  'message' => 'User has been deleted successfully!']);
        }
    }

    public function render()
    {
        $data = User::with('roles') // Replace with your model
            ->where(function ($query) {
                $query->where('is_admin', 1)
                    ->orWhere('is_company', 1);
            })
            ->where('first_name', 'like', '%' . $this->search . '%') // Adjust the column
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.user.index', ['data' => $data]);
    }
}
