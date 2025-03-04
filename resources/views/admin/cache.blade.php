@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container-fluid">
    <livewire:clear-cache title="{{ $title }}" />
</div>
@endsection