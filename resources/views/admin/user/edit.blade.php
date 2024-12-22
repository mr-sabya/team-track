@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">

            <livewire:admin.user.edit userId="{{ $user->id }}" title="{{ $title }}" />

        </div>

    </div>

</div>
@endsection