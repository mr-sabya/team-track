@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $title }} List</h3>
                    <a href="{{{ route('company.create') }}}" wire:navigate class="btn btn-primary"><i class="ri-add-line"></i> Add {{ $title }}</a>
                </div>
                <div class="card-body">
                    <livewire:component.company.index />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection