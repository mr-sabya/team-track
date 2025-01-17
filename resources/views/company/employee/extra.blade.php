@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-2">
            <div class="card">
                <livewire:company.employee.menu id="{{ $employee->id }}" />
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Extras ({{ $employee->first_name }} {{ $employee->last_name }})</h3>
                </div>
                <div class="card-body">
                    <livewire:component.employee.extra id="{{ $employee->id }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection