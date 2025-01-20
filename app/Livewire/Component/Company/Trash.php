<?php

namespace App\Livewire\Component\Company;

use App\Models\Company;
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

    // Sorting method for pagination
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    // Confirm delete method
    public function confirmDelete($id)
    {
        $this->deleteId = $id; // Set the record to be deleted
    }

    // Soft delete company
    public function delete()
    {
        if ($this->deleteId) {
            $company = Company::withTrashed()->findOrFail($this->deleteId);

            // Force delete the company
            $company->forceDelete();

            $this->deleteId = null;
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Company has been permanently deleted!']);
        }
    }

    // Restore the soft-deleted company
    public function restore($id)
    {
        $company = Company::onlyTrashed()->find($id);
        if ($company) {
            $company->restore();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Company has been restored successfully!']);
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Error restoring company.']);
        }
    }

    public function render()
    {
        $query = Company::onlyTrashed();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $companies = $query->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.component.company.trash', ['companies' => $companies]);
    }

}
