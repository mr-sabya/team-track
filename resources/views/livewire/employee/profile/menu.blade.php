<nav class="d-md-block side-menu">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.profile') ? 'active': '' }}" href="{{ route('employee-dash.profile') }}" wire:navigate>Bsic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.visa') ? 'active': '' }}" href="{{ route('employee-dash.visa') }}" wire:navigate>Visa Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.passport') ? 'active': '' }}" href="{{ route('employee-dash.passport') }}" wire:navigate>Passport Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.vehicle') ? 'active': '' }}" href="{{ route('employee-dash.vehicle') }}" wire:navigate>Vehicle Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.driving-license') ? 'active': '' }}" href="{{ route('employee-dash.driving-license') }}" wire:navigate>Driving License </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.emirates') ? 'active': '' }}" href="{{ route('employee-dash.emirates') }}" wire:navigate>Emirates Info </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.insurance') ? 'active': '' }}" href="{{ route('employee-dash.insurance') }}" wire:navigate>Insurance Info </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee-dash.extras') ? 'active': '' }}" href="{{ route('employee-dash.extras') }}" wire:navigate>Extras </a>
            </li>
        </ul>

    </div>
</nav>