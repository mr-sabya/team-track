@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:company.plan.apply planId="{{ $plan->id }}" />
</div>
@endsection