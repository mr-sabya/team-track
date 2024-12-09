<div class="d-flex gap-2">
    <!-- Edit Button -->
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>

    <!-- Delete Button -->
    <button
        class="btn btn-danger btn-sm"
        wire:click="$emit('confirmDelete', {{ $user->id }})"
        data-bs-toggle="modal"
        data-bs-target="#deleteModal">
        Delete
    </button>
</div>