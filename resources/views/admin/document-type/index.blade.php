@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container-fluid">
    <livewire:admin.document-type.index title="{{ $title }}" />
</div>
@endsection