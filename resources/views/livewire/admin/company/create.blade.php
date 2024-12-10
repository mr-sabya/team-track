<div>
    <form wire:submit.prevent="save">
        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control" wire:model.defer="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="trade_license" class="form-label">Trade License</label>
                    <input type="date" id="trade_license" class="form-control" wire:model.defer="trade_license">
                    @error('trade_license') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="establishment_card" class="form-label">Establishment Card</label>
                    <input type="date" id="establishment_card" class="form-control" wire:model.defer="establishment_card">
                    @error('establishment_card') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="vehicle" class="form-label">Vehicle</label>
                    <input type="date" id="vehicle" class="form-control" wire:model.defer="vehicle">
                    @error('vehicle') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="domain_subscriptions" class="form-label">Domain Subscriptions</label>
                    <input type="date" id="domain_subscriptions" class="form-control" wire:model.defer="domain_subscriptions">
                    @error('domain_subscriptions') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- Column 2 -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tenancy_agreement" class="form-label">Tenancy Agreement</label>
                    <input type="date" id="tenancy_agreement" class="form-control" wire:model.defer="tenancy_agreement">
                    @error('tenancy_agreement') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="electricity_bills" class="form-label">Electricity Bills</label>
                    <input type="date" id="electricity_bills" class="form-control" wire:model.defer="electricity_bills">
                    @error('electricity_bills') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="wifi_bills" class="form-label">WiFi Bills</label>
                    <input type="date" id="wifi_bills" class="form-control" wire:model.defer="wifi_bills">
                    @error('wifi_bills') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="sewerage_bills" class="form-label">Sewerage Bills</label>
                    <input type="date" id="sewerage_bills" class="form-control" wire:model.defer="sewerage_bills">
                    @error('sewerage_bills') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="mobile_bills" class="form-label">Mobile Bills</label>
                    <input type="date" id="mobile_bills" class="form-control" wire:model.defer="mobile_bills">
                    @error('mobile_bills') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>