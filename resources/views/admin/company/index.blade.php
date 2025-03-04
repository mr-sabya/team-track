@extends('layouts.app')

@section('title', 'Company')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $title }} List</h3>
                    <div>
                        <a href="{{{ route('company.create') }}}" wire:navigate class="btn btn-primary"><i class="ri-add-line"></i> Add {{ $title }}</a>
                        <a href="{{{ route('company.trash') }}}" wire:navigate class="btn btn-primary"><i class="ri-delete-bin-line"></i> Trash (<span id="trash-count">{{ $trash }}</span>)</a>
                    </div>
                </div>
                <div class="card-body">
                    <livewire:component.company.index />
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection


@section('scripts')
<script>
    document.addEventListener('livewire:init', function() {
        // Listen for the Livewire event to update the trash count
        Livewire.on('updateTrashCount', () => {
            fetch('{{ route('company.trashcounter') }}')
                .then(response => response.json())
                .then(data => {
                    // Update the trash count on the page
                    console.log(data.trash_count)
                    document.getElementById('trash-count').innerText = data.trash_count;
                })
                .catch(error => {
                    console.error('Error fetching trash count:', error);
                });
        });
    });
</script>
@endsection