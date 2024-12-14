@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:employee.profile.password id="{{ $employee->id }}" />
</div>
@endsection