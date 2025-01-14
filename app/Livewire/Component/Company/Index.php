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
            Company::findOrFail($this->deleteId)->delete(); // Replace User with your model
            $this->deleteId = null;
            session()->flash('message', 'Record deleted successfully!');
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
