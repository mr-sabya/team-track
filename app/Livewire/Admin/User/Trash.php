<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Trash extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $sortField = 'id'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    public $perPage = 10; // Items per page
    public $deleteId = null; // Holds the ID of the record to delete

    protected $queryString = ['search', 'sortField', 'sortDirection', 'perPage'];

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
            User::findOrFail($this->deleteId)->delete(); // Soft delete the user
            $this->deleteId = null;
            $this->dispatch('alert', ['type' => 'success', 'message' => 'User has been deleted successfully!']);
        }
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        if ($user) {
            $user->restore();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'User has been restored successfully!']);
        }
    }

    public function render()
    {
        $query = User::onlyTrashed() // Ensure `onlyTrashed()` is called first
            ->where(function ($query) {
                $query->where('is_admin', 1)
                    ->orWhere('is_company', 1);
            });

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            });
        }

        // Add sorting and pagination
        $data = $query->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.user.trash', ['data' => $data]);
    }
}
