@extends('layouts.app')

@section('title', 'Trash Company')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $title }} List</h3>
                    <a href="{{{ route('company.index') }}}" wire:navigate class="btn btn-primary"><i class="ri-add-line"></i> All {{ $title }}</a>
                </div>
                <div class="card-body">
                    <livewire:component.company.trash />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection