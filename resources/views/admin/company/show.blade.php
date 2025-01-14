@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Employee List: {{ $company->name }}</h3>
                </div>
                <div class="card-body">
                    <livewire:component.company.show id="{{ $company->id }}"/>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection