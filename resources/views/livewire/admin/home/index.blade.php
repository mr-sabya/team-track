<div>
    

    <!-- show info -->
    <div class="row">
        <div class="col-lg-2">
            <livewire:theme.info-card title="Passport" model="Passport" className="bg-primary" icon="ri-passport-line" />
        </div>

        <!-- visa -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Visa" model="Visa" className="bg-warning" icon="ri-visa-line" />
        </div>


        <!-- Emirates ID -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Emirates ID" model="EmiratesInfo" className="bg-info" icon="ri-bank-card-line" />
        </div>


        <!-- insurance -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Insurance" model="InsuranceInfo" className="bg-primary" icon="ri-refund-line" />
        </div>


        <!-- vehicle -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Vehicle" model="Vehicle" className="bg-warning" icon="ri-truck-line" />
        </div>


        <!-- Driving License -->
        <div class="col-lg-2">
            <livewire:theme.info-card title="Driving L." model="DrivingLicense" className="bg-info" icon="ri-bank-card-2-line" />
        </div>


    </div>
    <!-- show info -->
    <!-- end row -->



    <div class="row">
        <div class="col-lg-8">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="mb-4 mt-0 card-title">Recent Employees</h4>
                    <div class="row">
                        <div class="col-12">
                            <livewire:component.employee.index isDatatable="0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="mb-4 mt-0 card-title">Recent Comopanies</h4>
                    <div class="row">
                        <div class="col-12">
                            <livewire:admin.company.index-name />
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>