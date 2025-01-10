<nav class="d-md-block side-menu">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.edit') ? 'active': '' }}" href="{{ route('employee.edit', $employee_id) }}" wire:navigate>Bsic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.visa') ? 'active': '' }}" href="{{ route('employee.visa', $employee_id) }}" wire:navigate>Visa Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.passport') ? 'active': '' }}" href="{{ route('employee.passport', $employee_id) }}" wire:navigate>Passport Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.vehicle') ? 'active': '' }}" href="{{ route('employee.vehicle', $employee_id) }}" wire:navigate>Vehicle Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.driving-license') ? 'active': '' }}" href="{{ route('employee.driving-license', $employee_id) }}" wire:navigate>Driving License </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.emirates') ? 'active': '' }}" href="{{ route('employee.emirates', $employee_id) }}" wire:navigate>Emirates Info </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.insurance') ? 'active': '' }}" href="{{ route('employee.insurance', $employee_id) }}" wire:navigate>Insurance Info </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('employee.extras') ? 'active': '' }}" href="{{ route('employee.extras', $employee_id) }}" wire:navigate>Extras</a>
            </li>
        </ul>

    </div>
</nav>