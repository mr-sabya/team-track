<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    public $name, $permissionId;
    public $isEditing = false;
    public $search = '', $title;
    public $editMode = false;

    protected $rules = [
        'name' => 'required|string|unique:permissions,name',
    ];

    protected $paginationTheme = 'bootstrap'; // If using Bootstrap

    public function mount($title)
    {
        $this->title = $title;
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when searching
    }

    public function resetInput()
    {
        $this->name = '';
        $this->isEditing = false;
        $this->permissionId = null;
    }

    public function store()
    {
        $this->validate();
        Permission::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);
      
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Permission has been created successfully.']);
        $this->resetInput();
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $this->name = $permission->name;
        $this->permissionId = $permission->id;
        $this->isEditing = true;
    }

    public function update()
    {
        $permission = Permission::findOrFail($this->permissionId);

        if ($permission->name == $this->name) {
            $this->validate([
                'name' => 'required|string',
            ]);
        } else {
            $this->validate([
                'name' => 'required|string|unique:permissions,name',
            ]);
        }


        $permission->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Permission has been updated successfully.']);
        $this->resetInput();
    }

    public function delete($id)
    {
        Permission::findOrFail($id)->delete();
        $this->dispatch('alert', ['type' => 'success',  'message' => 'Permission has been deleted successfully.']);
    }

    public function render()
    {
        $permissions = Permission::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.permission.index', [
            'permissions' => $permissions,
        ]);
    }
}
