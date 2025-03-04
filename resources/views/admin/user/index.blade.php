@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add New {{ $title }}</h4>
                </div>
                <div class="card-body">
                    <livewire:admin.user.create />
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $title }} List</h4>
                    <a href="{{ route('user.trash') }}" wire:navigate class="btn btn-primary"><i class="ri-delete-bin-line"></i> Trash (<span id="trash-count">{{ $trash }}</span>)</a>
                </div>
                <div class="card-body">
                    <livewire:admin.user.index />
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('livewire:init', function() {
        // Listen for the Livewire event to update the trash count
        Livewire.on('updateTrashCount', () => {
            fetch('{{ route('user.trashcounter') }}')
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