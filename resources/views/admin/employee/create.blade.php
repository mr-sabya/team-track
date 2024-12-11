@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Employee</h3>
                </div>
                <div class="card-body">
                    <livewire:admin.employee.create />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection