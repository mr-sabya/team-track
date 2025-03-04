<div>
    @if ($message)
    <div class="alert alert-success">{{ $message }}</div>
    @endif

    <button wire:click="clearCache" class="btn btn-danger">
        Clear All Cache (App, Config, View, Route)
    </button>
</div>