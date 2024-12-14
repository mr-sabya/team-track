<div>
    <div class="card">
        <div class="card-body {{ $className }} d-flex justify-content-between">
            <div class="icon">
                <h2 class="text-white">
                    <i class="{{ $icon }}"></i>
                </h2>
            </div>
            <div class="text text-end">
                <h2 class="m-0 text-white"><b>{{ $totalExpiringSoon }}</b></h2>
                <h4 class="card-title text-white">{{ $title }} Expiring</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body bg-danger d-flex justify-content-between">
            <div class="icon">
                <h2 class="text-white">
                    <i class="{{ $icon }}"></i>
                </h2>
            </div>
            <div class="text text-end">
                <h2 class="m-0 text-white"><b>{{ $totalExpired }}</b></h2>
                <h4 class="card-title text-white">{{ $title }} Expired</h4>
            </div>
        </div>
    </div>
</div>