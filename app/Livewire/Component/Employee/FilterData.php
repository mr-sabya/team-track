<?php

namespace App\Livewire\Component\Employee;

use App\Exports\UsersFilterExport;
use App\Models\Company;
use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class FilterData extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $filter = 'all'; // Filter criteria
    public $relation = 'all'; // Default relation to filter
    public $search = ''; // Search term

    public $company_id;
    public $companies;

    public function mount()
    {
        // Load all companies to populate the dropdown
        $this->companies = Company::all();
    }

    // Reset pagination when filter or relation changes
    public function updatedFilter()
    {
        $this->resetPage();
    }

    public function updatedRelation()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function export()
    {
        // Generate the file name dynamically based on the selected filters and company
        $fileName = 'users_';

        if ($this->company_id) {
            $company = Company::find($this->company_id);
            $fileName .= $company->name . '_';
        }

        if ($this->relation !== 'all') {
            $fileName .= ucfirst($this->relation) . '_';
        } else {
            $fileName .= 'All_Relations_';
        }

        if ($this->filter) {
            $fileName .= ucfirst($this->filter) . '_';
        }

        $fileName .= now()->format('Y-m-d_H-i-s') . '.xlsx';  // Append current timestamp for uniqueness

        return Excel::download(new UsersFilterExport($this->company_id, $this->relation, $this->filter, $this->search), $fileName);
    }


    public function render()
    {
        $query = User::query();

        // Filter by company
        if ($this->company_id) {
            $query->where('company_id', $this->company_id);
        }

        // Handle filtering by relation
        if ($this->relation === 'all') {
            // Apply filter to all relations
            if ($this->filter === 'expired' || $this->filter === 'expiring') {
                $query->where(function ($q) {
                    foreach ($this->relations as $relation) {
                        $q->orWhereHas($relation, function ($subQuery) {
                            if ($this->filter === 'expired') {
                                $subQuery->where('expiry_date', '<', now());
                            } elseif ($this->filter === 'expiring') {
                                $subQuery->whereBetween('expiry_date', [now(), now()->addDays(30)]);
                            }
                        });
                    }
                });
            }
        } else {
            // Apply filter to the selected relation
            if ($this->filter === 'expired' || $this->filter === 'expiring') {
                $query->whereHas($this->relation, function ($q) {
                    if ($this->filter === 'expired') {
                        $q->where('expiry_date', '<', now());
                    } elseif ($this->filter === 'expiring') {
                        $q->whereBetween('expiry_date', [now(), now()->addDays(30)]);
                    }
                });
            }
        }

        // Add search functionality
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            });
        }

        // Eager load relations and paginate results
        $users = $query->with([
            'visa',
            'passport',
            'vehicle',
            'drivingLicense',
            'emiratesInfo',
            'insuranceInfo'
        ])->where('is_employee', 1)
            ->paginate(10);

        return view('livewire.component.employee.filter-data', [
            'users' => $users,
        ]);
    }
}
