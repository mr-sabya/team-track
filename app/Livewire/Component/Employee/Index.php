<?php

namespace App\Livewire\Component\Employee;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $companyId = '';
    public $isDatatable;
    public $isCompanyRoute = '';

    public $search = '';
    public $sortField = 'id'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    public $perPage = 10; // Items per page
    public $deleteId = null; // Holds the ID of the record to delete

    protected $queryString = ['search', 'sortField', 'sortDirection', 'perPage'];

    protected $listeners = ['userCreated' => 'refreshUsers'];


    public function mount($companyId = null, $isDatatable = null, $isCompanyRoute = null)
    {
        if ($isDatatable == 1) {
            $this->isDatatable = true;
        }elseif ($isDatatable == 0){
            $this->isDatatable = false;
        }

        if ($companyId != null) {
            $this->companyId = $companyId;
        }

        if ($isCompanyRoute != null) {
            $this->isCompanyRoute = $isCompanyRoute;
        }

        //  dd($this->isDatatable);
    }


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
            $this->dispatch('updateTrashCount');
            $this->deleteId = null;
            $this->dispatch('alert', ['type' => 'success',  'message' => 'Employee has been deleted successfully!']);
        }
    }

    public function render()
    {
        $query = User::query()->where('is_employee', 1);

        if ($this->companyId) {
            $query->where('company_id', $this->companyId);
        }

        if ($this->isDatatable) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection);

            $data = $query->paginate($this->perPage);
        } else {
            $data = $query->take(10)->get();
        }

        // dd($data);

        return view('livewire.component.employee.index', ['data' => $data]);
    }
}
