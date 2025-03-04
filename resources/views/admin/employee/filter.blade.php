@extends('layouts.app')

@section('title', 'Filter Employee List')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Filter {{ $title }} List</h3>
                    <div class="action">
                        <a href="{{{ route('employee.create') }}}" wire:navigate class="btn btn-primary"><i class="ri-add-line"></i> Add {{ $title }}</a>
                        <a href="{{{ route('employee.bulk') }}}" wire:navigate class="btn btn-primary"><i class="ri-add-line"></i> Add {{ $title }} (Bulk)</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- employee list component -->
                    <livewire:component.employee.filter-data/>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection