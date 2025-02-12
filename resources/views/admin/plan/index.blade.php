@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:admin.plan.index title="{{ $title }}" />
</div>
@endsection