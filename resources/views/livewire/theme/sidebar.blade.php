<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>



                @if(Auth::user()->is_admin)

                @if( Auth::user()->is_superadmin || Auth::user()->can('dashboard'))
                <li class="{{ Route::is('home') ? 'mm-active' : '' }}">
                    <a href="{{ route('home') }}" wire:navigate class="waves-effect {{ Route::is('home') ? 'active' : '' }}">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif

                @if( Auth::user()->is_superadmin || Auth::user()->can('manage-insurance-type'))
                <li>
                    <a href="{{ route('insurance.index') }}" wire:navigate class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Insurance Type</span>
                    </a>
                </li>
                @endif






                @if( Auth::user()->is_superadmin)
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Role & Permissions</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('permission.index') }}" wire:navigate>Permissions</a></li>
                        <li><a href="{{ route('role.index') }}" wire:navigate>Roles</a></li>
                    </ul>
                </li>
                @endif



                <li class="menu-title">Pages</li>
                @if( Auth::user()->is_superadmin || Auth::user()->can('manage-company') && Auth::user()->can('manage-employee'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Company</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach($companies as $company)
                        <li><a href="{{ route('company.show', $company->id) }}" wire:navigate>{{ $company->name }}</a></li>
                        @endforeach

                    </ul>
                </li>
                @endif

                @if( Auth::user()->is_superadmin || Auth::user()->can('manage-employee'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('employee.index') }}" wire:navigate>Employee List</a></li>
                        <li><a href="{{ route('employee.create') }}" wire:navigate>Add Employee</a></li>

                    </ul>
                </li>
                @endif

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if( Auth::user()->is_superadmin)
                        <li><a href="{{ route('user.index') }}" wire:navigate>User Management</a></li>
                        @endif

                        @if( Auth::user()->is_superadmin || Auth::user()->can('manage-company'))
                        <li><a href="{{ route('company.index') }}" wire:navigate>Company Management</a></li>
                        @endif

                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>

                @else

                <li class="{{ Route::is('employee-dash.home') ? 'mm-active' : '' }}">
                    <a href="{{ route('employee-dash.home') }}" wire:navigate class="waves-effect {{ Route::is('employee-dash.home') ? 'active' : '' }}">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('employee-dash.profile') }}" wire:navigate class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee-dash.password') }}" wire:navigate class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Change password</span>
                    </a>
                </li>

                @endif


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>