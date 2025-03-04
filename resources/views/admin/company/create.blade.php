@extends('layouts.app')

@section('title', 'Add New Company')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add New {{ $title }}</h3>
                </div>

                <div class="card-body">
                    <livewire:component.company.create />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection