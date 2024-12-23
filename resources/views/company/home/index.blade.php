@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <livewire:company.home.index id="{{ Auth::user()->company_id }}" />
</div>
@endsection