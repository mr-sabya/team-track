<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.edit-basic-info') ? 'active' : '' }}" href="{{ route('company-dash.edit-basic-info') }}" wire:navigate>Basic Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.profile-dates') ? 'active' : '' }}" href="{{ route('company-dash.profile-dates') }}" wire:navigate>Update Dates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company-dash.attachment') ? 'active' : '' }}" href="{{ route('company-dash.attachment') }}" wire:navigate>Attachments</a>
    </li>

</ul>