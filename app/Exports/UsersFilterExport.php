<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersFilterExport implements FromCollection
{
    protected $company_id;
    protected $relation;
    protected $filter;
    protected $search;

    public function __construct($company_id, $relation, $filter, $search)
    {
        $this->company_id = $company_id;
        $this->relation = $relation;
        $this->filter = $filter;
        $this->search = $search;
    }

    public function collection()
    {
        $query = User::query();

        // Filter by company
        if ($this->company_id) {
            $query->where('company_id', $this->company_id);
        }

        // Apply filters for relation and expiry dates
        if ($this->relation === 'all') {
            if ($this->filter === 'expired' || $this->filter === 'expiring') {
                $query->where(function ($q) {
                    $relations = ['visa', 'passport', 'vehicle', 'drivingLicense', 'emiratesInfo', 'insuranceInfo'];
                    foreach ($relations as $relation) {
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
            if ($this->filter === 'expired' || $this->filter === 'expiring') {
                $query->whereHas($this->relation, function ($subQuery) {
                    if ($this->filter === 'expired') {
                        $subQuery->where('expiry_date', '<', now());
                    } elseif ($this->filter === 'expiring') {
                        $subQuery->whereBetween('expiry_date', [now(), now()->addDays(30)]);
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

        $users = $query->with($this->relation === 'all' ? ['visa', 'passport', 'vehicle', 'drivingLicense', 'emiratesInfo', 'insuranceInfo'] : [$this->relation])->where('is_employee', 1)->get();

        return $users->map(function ($user) {
            // For each relation, retrieve expiry date dynamically
            $relationData = [];
            if ($this->relation === 'all') {
                $relations = ['visa', 'passport', 'vehicle', 'drivingLicense', 'emiratesInfo', 'insuranceInfo'];
                foreach ($relations as $relation) {
                    if ($user->$relation) {
                        $relationData[] = [
                            'relation' => ucfirst($relation),
                            'expiry_date' => $user->$relation->expiry_date ?? 'N/A',
                        ];
                    }
                }
            } elseif ($user->{$this->relation}) {
                $relationData[] = [
                    'relation' => ucfirst($this->relation),
                    'expiry_date' => $user->{$this->relation}->expiry_date ?? 'N/A',
                ];
            }

            // Return user and relation data for Excel
            return [
                'ID' => $user->id,
                'Name' => $user->first_name . ' ' . $user->last_name,
                'Email' => $user->email,
                'Phone' => $user->phone,
                'Address' => $user->address,
                'Country' => $user->country->name ?? 'N/A',
                'Company' => $user->company->name ?? 'N/A',
                'Relation' => implode(', ', array_column($relationData, 'relation')),
                'Expiry Date' => implode(', ', array_column($relationData, 'expiry_date')),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Country',
            'Company',
            'Relation',
            'Expiry Date',
        ];
    }
}
