@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Employee List</h3>
                </div>
                <div class="card-body">
                    <livewire:admin.employee.index />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection