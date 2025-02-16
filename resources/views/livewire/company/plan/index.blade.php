<div class="">
    <!-- Success or Error Message -->
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <!-- Current Plan Card -->
        

        <!-- Available Plans -->
        <div class="col-lg-6">
            <div class="row">
                @foreach($plans as $plan)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-light rounded-lg {{ $plan->id === $selectedPlanId ? 'border-primary' : 'border-secondary' }}">
                        <div class="card-header text-center {{ $plan->id === $selectedPlanId ? 'bg-primary text-white' : 'bg-light' }}">
                            <h5 class="card-title mb-0">{{ $plan->name }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <h3 class="text-dark">${{ $plan->price }}</h3>
                            <p class="text-muted">Per Month</p>
                            <p><strong>Max Employees:</strong> {{ $plan->max_employees }}</p>
                            <p class="card-text">{{ Str::limit($plan->description, 120) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            @if ($plan->id === $selectedPlanId)
                            <!-- Display Current Plan button for selected plan -->
                            <button class="btn btn-outline-secondary btn-block mt-2" disabled>
                                Current Plan
                            </button>
                            @else
                            <!-- Display Apply Plan button for other plans -->
                            <a class="btn btn-primary btn-block mt-2" href="{{ route('company-dash.plan.apply', $plan->id) }}" wire:navigate>
                                Apply Plan
</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>