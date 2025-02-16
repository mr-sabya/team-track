@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:company.plan.index companyId="{{ Auth::user()->company_id }}" />
</div>
@endsection