@extends('layouts.app')

@section('title', 'Insurance')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-2">
            <div class="card">
                <livewire:admin.employee.menu id="{{ $employee->id }}" />
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Insurance Info ({{ $employee->first_name }} {{ $employee->last_name }})</h3>
                </div>
                <div class="card-body">
                    <livewire:component.employee.insurance id="{{ $employee->id }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection