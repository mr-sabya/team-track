@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container-fluid">
    <livewire:admin.plan.company-plans title="{{ $title }}" />
</div>
@endsection