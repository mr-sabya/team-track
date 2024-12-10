@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add New company</h3>
                </div>

                <div class="card-body">
                    <livewire:admin.company.create />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection