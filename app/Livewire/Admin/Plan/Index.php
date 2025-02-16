<?php

namespace App\Livewire\Admin\Plan;

use App\Models\Plan;
use Livewire\Component;

class Index extends Component
{
    public $plans, $name, $price, $max_employees, $plan_id;
    public $isEditMode = false;



    // Show the form for creating a new plan
    public function create()
    {
        $this->resetInputFields();
        $this->isEditMode = false;
    }

    // Store the plan in the database
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'max_employees' => 'required|integer',
        ]);

        Plan::create([
            'name' => $this->name,
            'price' => $this->price,
            'max_employees' => $this->max_employees,
        ]);

        session()->flash('message', 'Plan created successfully!');
        $this->resetInputFields();
    }

    // Show the form for editing the plan
    public function edit($id)
    {
        $plan = Plan::find($id);
        $this->plan_id = $plan->id;
        $this->name = $plan->name;
        $this->price = $plan->price;
        $this->max_employees = $plan->max_employees;
        $this->isEditMode = true;
    }

    // Update the plan in the database
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'max_employees' => 'required|integer',
        ]);

        $plan = Plan::find($this->plan_id);
        $plan->update([
            'name' => $this->name,
            'price' => $this->price,
            'max_employees' => $this->max_employees,
        ]);

        session()->flash('message', 'Plan updated successfully!');
        $this->resetInputFields();
    }

    // Delete a plan from the database
    public function delete($id)
    {
        Plan::find($id)->delete();
        session()->flash('message', 'Plan deleted successfully!');
    }

    // Reset input fields
    private function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
        $this->max_employees = '';
        $this->plan_id = null;
    }

    // Render the view with the data
    public function render()
    {
        $this->plans = Plan::all();
        return view('livewire.admin.plan.index');
    }
}
