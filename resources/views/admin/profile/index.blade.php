@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container-fluid">

    <livewire:component.profile.index />
    <livewire:component.profile.password />
    <!-- end row -->
</div>
@endsection