@extends('layouts.app')

@section('title', 'Add Bulk Employee')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Bulk {{ $title }}</h3>
                </div>
                <div class="card-body">
                    <livewire:component.employee.user-data-upload />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection