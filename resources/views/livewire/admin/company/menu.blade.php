<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company.edit-basic-info') ? 'active' : '' }}" href="{{ route('company.edit-basic-info', $companyId) }}" wire:navigate>Basic Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company.edit') ? 'active' : '' }}" href="{{ route('company.edit', $companyId) }}" wire:navigate>Update Dates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('company.attachment') ? 'active' : '' }}" href="{{ route('company.attachment', $companyId) }}" wire:navigate>Attachments</a>
    </li>

</ul>