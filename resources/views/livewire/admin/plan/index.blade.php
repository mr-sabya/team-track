<div>
    <!-- Row Layout for Form and Table -->
    <div class="row">
        <!-- Left Column - Plan Form -->
        <div class="col-md-6">
            <!-- Plan Form Card -->
            <div class="card">
                <div class="card-header">
                    @if($isEditMode) Edit Plan @else Create Plan @endif
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                        <div class="form-group">
                            <label for="name">Plan Name</label>
                            <input type="text" class="form-control" id="name" wire:model="name" placeholder="Enter plan name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" wire:model="price" placeholder="Enter price">
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="max_employees">Max Employees</label>
                            <input type="number" class="form-control" id="max_employees" wire:model="max_employees" placeholder="Enter max employees">
                            @error('max_employees') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            @if($isEditMode) Update Plan @else Create Plan @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column - Plan Table -->
        <div class="col-md-6">
            <!-- Plan List Card -->
            <div class="card">
                <div class="card-header">
                    Plans List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Max Employees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plans as $plan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $plan->name }}</td>
                                <td>${{ $plan->price }}</td>
                                <td>{{ $plan->max_employees }}</td>
                                <td>
                                    <button class="btn btn-primary" wire:click="edit({{ $plan->id }})">Edit</button>
                                    <button class="btn btn-danger" wire:click="delete({{ $plan->id }})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>