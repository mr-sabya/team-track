<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    use WithPagination;

    public $name, $roleId, $selectedPermissions = [];
    public $isEditing = false;
    public $search = '';
    public $permissions;
    public $title;

    protected $rules = [
        'name' => 'required|string|unique:roles,name',
    ];

    protected $paginationTheme = 'bootstrap'; // If using Bootstrap

    public function mount($title)
    {
        $this->permissions = Permission::all();
        $this->title = $title;
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when searching
    }

    public function resetInput()
    {
        $this->name = '';
        $this->roleId = null;
        $this->selectedPermissions = [];
        $this->isEditing = false;
    }

    public function store()
    {
        $this->validate();


        $role = Role::create(['name' => $this->name]);

        // Convert selectedPermissions (IDs) to names
        $permissions = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Role has been created successfully with permissions.']);

        $this->resetInput();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->name = $role->name;
        $this->roleId = $role->id;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
        $this->isEditing = true;
    }

    public function update()
    {
        $role = Role::findOrFail($this->roleId);
        if ($role->name == $this->name) {
            $this->validate([
                'name' => 'required|string',
            ]);
        } else {
            $this->validate([
                'name' => 'required|string|unique:roles,name',
            ]);
        }


        $role->update(['name' => $this->name]);

        // Convert selectedPermissions (IDs) to names
        $permissions = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Role has been updated successfully with permissions.']);
        $this->resetInput();
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Role has been deleted successfully']);
    }

    public function render()
    {
        $roles = Role::with('permissions')
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.role.index', [
            'roles' => $roles,
            'permissions' => $this->permissions,
        ]);
    }
}
