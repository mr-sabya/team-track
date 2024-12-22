@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:admin.permission.index title="{{ $title }}" />
</div>
@endsection