@extends('layouts.app')

@section('title', 'Edit Dates')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <livewire:admin.company.menu companyId="{{ $company->id }}" />
            <div class="card">
                <div class="card-header">
                    <h3>Edit Dates - <strong>{{ $company->name }}</strong></h3>
                </div>

                <div class="card-body">
                    <livewire:component.company.edit id="{{ $company->id }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection