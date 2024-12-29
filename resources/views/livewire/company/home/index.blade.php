<div>

    <!-- show info -->
    <div class="row">
        <div class="col-lg-2">
            <livewire:theme.info-card title="Passport" model="Passport" className="bg-primary" icon="ri-passport-line" companyId="{{ $companyId }}" />
        </div>

        <!-- visa -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Visa" model="Visa" className="bg-warning" icon="ri-visa-line" companyId="{{ $companyId }}" />
        </div>


        <!-- Emirates ID -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Emirates ID" model="EmiratesInfo" className="bg-info" icon="ri-bank-card-line" companyId="{{ $companyId }}" />
        </div>


        <!-- insurance -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Insurance" model="InsuranceInfo" className="bg-primary" icon="ri-refund-line" companyId="{{ $companyId }}" />
        </div>


        <!-- vehicle -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Vehicle" model="Vehicle" className="bg-warning" icon="ri-truck-line" companyId="{{ $companyId }}" />
        </div>


        <!-- Driving License -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Driving L." model="DrivingLicense" className="bg-info" icon="ri-bank-card-2-line" companyId="{{ $companyId }}" />
        </div>


    </div>
    <!-- show info -->

    <!-- employee list  -->
    <livewire:component.employee.index companyId="{{ Auth::user()->company_id }}" isDatatable="0" isCompanyRoute="yes" />

</div>