<div class="">
    <h2 class="mb-4 text-center">Super Admin - Plan Management</h2>

    <div class="row">
        <!-- Recent Applications Section -->
        <div class="col-lg-4">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Recent Applications</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($recentApplications as $company)
                        <li class="list-group-item">
                            <strong>{{ $company->name }}</strong> applied for
                            <span class="badge bg-info">{{ $company->subscriptionPlan->name ?? 'N/A' }}</span>
                            <span class="text-muted">({{ $company->subscription_applied_at->diffForHumans() }})</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- All Companies and Plans Section -->
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">All Companies & Subscription Plans</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Plan Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Applied At</th>
                                <th>Start Date</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->subscriptionPlan->name ?? 'N/A' }} <strong>({{ $company->subscription_plan_id == 1 ? 'Free Plan' : '' }})</strong></td>
                                <td>
                                    <span class="badge {{ $company->subscription_type == 'monthly' ? 'bg-info' : 'bg-success' }}">
                                        {{ ucfirst($company->subscription_type) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $company->subscription_status == 'active' ? 'bg-primary' : 'bg-danger' }}">
                                        {{ ucfirst($company->subscription_status) }}
                                    </span>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($company->subscription_applied_at)->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $company->subscription_start_date ? \Carbon\Carbon::parse($company->subscription_start_date)->toFormattedDateString() : 'N/A' }}
                                </td>
                                <td>
                                    {{ $company->subscription_expiry_date ? \Carbon\Carbon::parse($company->subscription_expiry_date)->toFormattedDateString() : 'N/A' }}   
                                <td>
                                    @if ($company->subscription_status === 'active')
                                    <button class="btn btn-danger btn-sm" wire:click="updateStatus({{ $company->id }}, 'suspended')">
                                        Suspend
                                    </button>
                                    @else
                                    <button class="btn btn-primary btn-sm" wire:click="updateStatus({{ $company->id }}, 'active')">
                                        Activate
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>