@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:employee.home.index id="{{ $employee->id }}" />
</div>
@endsection