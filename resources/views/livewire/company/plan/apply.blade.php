<div class="row">

    <span wire:loading>Applying...</span>

    <div class="col-lg-6">
        <div class="row">
            <!-- Monthly Plan Card -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <h5 class="card-title">Monthly Plan</h5>
                        <h2 class="text-primary">${{ number_format($monthlyPrice, 2) }}</h2>
                        <p class="text-muted">Billed every month</p>

                        @if ($selectedType === 'monthly' && $company->subscription_plan_id == $plan->id)
                        <button class="btn btn-outline-secondary btn-block" disabled>
                            Current Plan
                        </button>
                        @else
                        <button class="btn btn-primary btn-block mt-2"
                            wire:click="applyPlan('monthly')">
                            Apply Monthly Plan
                        </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Yearly Plan Card -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <h5 class="card-title">Yearly Plan</h5>
                        <h2 class="text-success">${{ number_format($yearlyPrice, 2) }}</h2>
                        <p class="text-muted">Billed annually </p>

                        @if ($selectedType === 'yearly' && $company->subscription_plan_id == $plan->id)
                        <button class="btn btn-outline-secondary btn-block" disabled>
                            Current Plan
                        </button>
                        @else
                        <button class="btn btn-primary btn-block mt-2"
                            wire:click="applyPlan('yearly')">
                            Apply Yearly Plan
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>