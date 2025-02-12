<div class="">
    <h4 class="mb-4">Your Notifications</h4>

    <div class="d-flex justify-content-between mb-4">
        <div>
            <button class="btn btn-danger btn-sm" wire:click="deleteAllNotifications" onclick="confirm('Are you sure you want to delete all notifications?') || event.stopImmediatePropagation()">
                Delete All Notifications
            </button>
        </div>
        <div>
            <select class="form-select w-auto" wire:model="perPage">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Notification</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notifications as $index => $notification)
                <tr>
                    <td>{{ $notifications->firstItem() + $index }}</td>
                    <td>{{ $notification->data['message'] ?? 'N/A' }}</td>
                    <td>
                        <span class="badge bg-{{ $notification->read_at ? 'success' : 'warning' }}">
                            {{ $notification->read_at ? 'Read' : 'Unread' }}
                        </span>
                    </td>
                    <td>{{ $notification->created_at->format('d M, Y h:i A') }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" wire:click="markAsRead('{{ $notification->id }}')">
                            Mark as Read
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="deleteNotification('{{ $notification->id }}')">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No notifications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $notifications->links() }}
    </div>
</div>