@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $title }} List</h3>
                    @php
                    $company = Auth::user()->company;
                    @endphp
                    @if($company->subscription_status === 'active')
                    <a href="{{{ route('company-dash.employee.create') }}}" wire:navigate class="btn btn-primary"><i class="ri-add-line"></i> Add {{ $title }}</a>
                    @endif
                </div>
                <div class="card-body">
                    <livewire:component.employee.index companyId="{{ Auth::user()->company_id }}" isDatatable="1" isCompanyRoute="yes" />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection