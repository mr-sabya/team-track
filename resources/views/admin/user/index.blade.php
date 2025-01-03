@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add New {{ $title }}</h4>
                </div>
                <div class="card-body">
                    <livewire:admin.user.create />
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }} List</h4>
                </div>
                <div class="card-body">
                    <livewire:admin.user.index />
                </div>
            </div>
        </div>
    </div>

</div>
@endsection