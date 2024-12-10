@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Company</h3>
                </div>

                <div class="card-body">
                    <livewire:admin.company.edit id="{{ $id }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection