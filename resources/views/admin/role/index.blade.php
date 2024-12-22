@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:admin.role.index title="{{ $title }}" />
</div>
@endsection