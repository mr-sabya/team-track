<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.employee.edit') ? 'active': '' }}" href="{{ route('company-dash.employee.edit', $employee_id) }}" wire:navigate>Bsic Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.employee.visa') ? 'active': '' }}" href="{{ route('company-dash.employee.visa', $employee_id) }}" wire:navigate>Visa Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.employee.passport') ? 'active': '' }}" href="{{ route('company-dash.employee.passport', $employee_id) }}" wire:navigate>Passport Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.employee.vehicle') ? 'active': '' }}" href="{{ route('company-dash.employee.vehicle', $employee_id) }}" wire:navigate>Vehicle Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.employee.driving-license') ? 'active': '' }}" href="{{ route('company-dash.employee.driving-license', $employee_id) }}" wire:navigate>Driving License </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.employee.emirates') ? 'active': '' }}" href="{{ route('company-dash.employee.emirates', $employee_id) }}" wire:navigate>Emirates Info </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.employee.insurance') ? 'active': '' }}" href="{{ route('company-dash.employee.insurance', $employee_id) }}" wire:navigate>Insurance Info </a>
    </li>
</ul>