<?php

namespace App\Livewire\Component\Employee;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;

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

            $user = User::withTrashed()->findOrFail($this->deleteId);

            // Delete related data
            $user->visa()->delete();
            $user->passport()->delete();
            $user->vehicle()->delete();
            $user->drivingLicense()->delete();
            $user->emiratesInfo()->delete();
            $user->insuranceInfo()->delete();
            $user->extras()->delete();

            // Now delete the user
            $user->forceDelete();

            $this->deleteId = null;
            $this->dispatch('alert', ['type' => 'success',  'message' => 'User has been deleted permanently!']);
        }
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        if ($user) {
            $user->restore();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'User has been restored successfully!']);
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Error restoring user.']);
        }
    }

    public function render()
    {
        $query = User::onlyTrashed()->where('is_employee', 1);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            });
        }

        $users = $query->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.component.employee.trash', ['users' => $users]);
    }
}
