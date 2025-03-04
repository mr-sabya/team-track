<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- logo -->
                <livewire:theme.logo />
                <!-- logo -->


            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>


        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    @if (auth()->user()->unreadNotifications->isNotEmpty())
                    <span class="noti-dot"></span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                @if(Auth::user()->is_admin)
                                <a wire:navigate href="{{ route('notification.index') }}" class="small"> View All</a>
                                @elseif(Auth::user()->is_company)
                                <a wire:navigate href="{{ route('company-dash.notification.index') }}" class="small"> View All</a>
                                @else
                                <a wire:navigate href="{{ route('employee-dash.notification.index') }}" class="small"> View All</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @forelse (auth()->user()->unreadNotifications as $notification)
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-1">
                                    <h6 class="mb-1">{{ $notification->data['message'] ?? 'N/A' }}</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->format('d M, Y h:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-1">
                                    <h6 class="mb-1">No new notifications</h6>
                                </div>
                            </div>
                        </a>
                        @endforelse

                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->image)
                    <img class="rounded-circle header-profile-user" src="{{ url('storage/', Auth::user()->image) }}"
                        alt="Header Avatar">
                    @else
                    <img class="rounded-circle header-profile-user" src="{{ url('assets/images/man-user-color-icon.svg') }}"
                        alt="Header Avatar">
                    @endif
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->first_name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    @if(Auth::user()->is_admin)
                    <a class="dropdown-item" href="{{ route('admin.profile') }}" wire:navigate><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item d-block" href="{{ route('notification.setting') }}" wire:navigate><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    @elseif(Auth::user()->is_company)
                    <a class="dropdown-item" href="{{ route('company-dash.profile') }}" wire:navigate><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item d-block" href="#" wire:navigate><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    @else
                    <a class="dropdown-item" href="{{ route('employee-dash.profile')}}" wire:navigate><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item d-block" href="#" wire:navigate><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    @endif

                    <div class="dropdown-divider"></div>
                    <livewire:auth.logout />
                </div>
            </div>


        </div>
    </div>
</header>