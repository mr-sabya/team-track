<?php

namespace App\Livewire\DataTable;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class UsersTable extends DataTableComponent
{
    public $confirmingUserId = null; // For delete confirmation
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSortingStatus(true);
        $this->setSortingStatus(false);
    }



    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('Name', 'first_name')
                ->format(
                    fn($value, $row, Column $column) => $row->first_name . ' ' . $row->last_name
                )
                ->searchable(), // Make it searchable
            Column::make('Email', 'email')
                ->searchable(),

            Column::make('Status', 'is_superadmin')  // Add a new column for displaying the status
                ->format(
                    fn($value, $row, Column $column) => $row->is_superadmin ? 'Admin' : 'Normal'  // Check if user is an admin
                ),

            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit') // Add the Edit button
                        ->title(fn($row) => 'Edit')
                        ->location(fn($row) => route('users.edit', $row->id))
                        ->attributes(fn($row) => [
                            'class' => 'btn btn-primary btn-sm',
                        ]),

                    LinkColumn::make('Delete') // Add the Delete button
                        ->title(fn($row) => 'Delete')
                        ->location(fn($row) => '#') // No direct route; uses modal for confirmation
                        ->attributes(fn($row) => [
                            'class' => 'btn btn-danger btn-sm',
                            'onclick' => "Livewire.dispatch('confirmDelete', {$row->id})", // Emit Livewire event
                        ]),
                ]),
        ];
    }


    public function search($query)
    {
        $searchTerm = $this->getSearch();

        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', "%{$searchTerm}%")
                    ->orWhere('last_name', 'like', "%{$searchTerm}%");
            });
        }

        return $query;
    }


    public function deleteUser()
    {
        if ($this->confirmingUserId) {
            User::findOrFail($this->confirmingUserId)->delete();
            $this->reset('confirmingUserId');
            $this->dispatch('modal-hide'); // Close modal using JS
            $this->dispatch('userDeleted'); // Optional for notifications or additional actions
        }
    }

    public function confirmDelete($userId)
    {
        $this->confirmingUserId = $userId;
        $this->dispatch('modal-show'); // Show modal using JS
    }
}
