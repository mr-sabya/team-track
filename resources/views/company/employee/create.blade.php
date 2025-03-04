@extends('layouts.app')

@section('content')

<div class="container-fluid">

    @php
    $company = Auth::user()->company;
    @endphp
    @if($company->subscription_status === 'active')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add New {{ $title }}</h3>
                </div>
                <div class="card-body">
                    <!-- check company has active plan -->

                    <livewire:component.employee.create companyId="{{ Auth::user()->company_id }}" />
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Your subscription is not active. Please contact to SUPER ADMIN to activate your subscription.
    </div>
    @endif
    <!-- end row -->
</div>
@endsection