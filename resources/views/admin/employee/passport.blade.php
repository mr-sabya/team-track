@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex justify-content-end">
                <livewire:admin.employee.menu id="{{ $employee->id }}"/>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Passport Info ({{ $employee->first_name }} {{ $employee->last_name }})</h3>
                </div>
                <div class="card-body">
                    <livewire:component.employee.passport-info id="{{ $employee->id }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection