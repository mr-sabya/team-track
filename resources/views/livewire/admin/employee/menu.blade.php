<ul class="nav nav-tabs">
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


</ul>