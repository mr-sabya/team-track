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
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @forelse (auth()->user()->unreadNotifications as $notification)
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
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
                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item d-block" href="#"><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <livewire:auth.logout />
                </div>
            </div>


        </div>
    </div>
</header>