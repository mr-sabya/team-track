@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <livewire:company.profile.index companyId="{{ Auth::user()->company_id }}" />
</div>
@endsection