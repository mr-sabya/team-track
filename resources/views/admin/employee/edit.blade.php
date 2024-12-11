@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex justify-content-end">
                <livewire:admin.employee.menu id="{{ $id }}"/>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Updte Basic Info</h3>
                </div>
                <div class="card-body">
                    <livewire:admin.employee.edit id="{{ $id }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection