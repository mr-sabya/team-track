<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3>Company Profile ({{ $company->name }})</h3>
            </div>
            <div class="card-body">
                <livewire:company.profile.info companyId="{{ $company->id }}" />
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <livewire:company.profile.menu companyId="{{ $company->id }}" />
        <div class="card">
            <div class="card-header">
                <h3>Edit Dates - <strong>{{ $company->name }}</strong></h3>
            </div>

            <div class="card-body">
                <livewire:component.company.edit id="{{ $company->id }}" />
            </div>
        </div>
    </div>
</div>