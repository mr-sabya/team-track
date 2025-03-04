@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container-fluid">


    <livewire:admin.insurance-type.trash title="{{ $title }}" />

</div>
@endsection