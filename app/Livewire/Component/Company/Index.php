<?php

namespace App\Livewire\Component\Company;

use App\Models\Company;
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
            // Find the company by ID, throw an exception if not found
            $company = Company::findOrFail($this->deleteId);

            // Check if the company has any employees
            if ($company->users()->count() > 0) {  // Assuming 'users' is the relationship name for employees
                // Dispatch error if employees are associated with the company
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Company cannot be deleted because it has employees.']);
            } else {
                // Delete the company if no employees are associated
                $company->delete();

                // Update the trash count after deletion
                $this->dispatch('updateTrashCount');

                // Clear the deleteId and show success alert
                $this->deleteId = null;
                $this->dispatch('alert', ['type' => 'success', 'message' => 'Company has been deleted successfully!']);
            }
        }
    }

    public function render()
    {
        $data = Company::query() // Replace with your model
            ->where('name', 'like', '%' . $this->search . '%') // Adjust the column
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);


        return view('livewire.component.company.index', [
            'data' => $data,
        ]);
    }
}
