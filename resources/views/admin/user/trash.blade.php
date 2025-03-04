@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $title }} List</h4>
                    <a href="{{ route('user.index') }}" wire:navigate class="btn btn-primary"><i class="ri-list-check"></i> All {{ $title }}</a>
                </div>
                <div class="card-body">
                    <livewire:admin.user.trash />
                </div>
            </div>
        </div>
    </div>

</div>
@endsection