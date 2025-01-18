@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:employee.home.index employeeId="{{ $employee->id }}" />
</div>
@endsection