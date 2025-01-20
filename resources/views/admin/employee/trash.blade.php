@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $title }} List</h3>
                    <div class="action">
                        <a href="{{{ route('employee.index') }}}" wire:navigate class="btn btn-primary"><i class="ri-add-line"></i> All {{ $title }}</a>

                    </div>
                </div>
                <div class="card-body">
                    <!-- employee list component -->
                    <livewire:component.employee.trash isDatatable="1" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection