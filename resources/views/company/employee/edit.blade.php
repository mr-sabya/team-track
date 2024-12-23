@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex justify-content-end">
                <livewire:company.employee.menu id="{{ $employee->id }}"/>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Basic Info ({{ $employee->first_name }} {{ $employee->last_name }})</h3>
                </div>
                <div class="card-body">
                    <livewire:admin.employee.edit id="{{ $employee->id }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection