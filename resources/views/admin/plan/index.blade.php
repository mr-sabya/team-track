@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container-fluid">
    <livewire:admin.plan.index title="{{ $title }}" />
</div>
@endsection