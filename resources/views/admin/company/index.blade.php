@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Company List</h3>
                </div>
                <div class="card-body">
                    <livewire:admin.company.index />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection