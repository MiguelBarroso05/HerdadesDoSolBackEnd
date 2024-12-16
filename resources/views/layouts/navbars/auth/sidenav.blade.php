<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <!-- Sidebar header -->
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="{{ route('home') }}">
            <img src="{{ asset('./imgs/logo/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Herdades Do Sol</span>
        </a>
    </div>
    <!-- Horizontal divider -->
    <hr class="horizontal dark mt-0">

    <!-- Sidebar navigation -->
    <div class="collapse navbar-collapse w-auto nav-side" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard Link -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <!-- Dashboard icon -->
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Users Section Header -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Users</h6>
            </li>

            <!-- Profile Link -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <!-- Profile icon -->
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>

            <!-- Users Link -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <!-- Users icon -->
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>

            <!-- Pages Section Header -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
            </li>

            <!-- Activities Link -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'activities.index' ? 'active' : '' }}" href="{{ route('activities.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <!-- Activities icon -->
                        <i class="ni ni-compass-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Activities</span>
                </a>
            </li>

            <!-- Activity Types Link -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'activity_types.index' ? 'active' : '' }}" href="{{ route('activity_types.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <!-- Activity Types icon -->
                        <i class="ni ni-compass-04 text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Activity Types</span>
                </a>
            </li>

            <!-- Accommodations Link -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'accommodations.index' ? 'active' : '' }}" href="{{ route('accommodations.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <!-- Accommodations icon -->
                        <i class="fa-solid fa-house-chimney text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Accommodations</span>
                </a>
            </li>

            <!-- accommodation Types Link -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'accommodation_types.index' ? 'active' : '' }}" href="{{ route('accommodation_types.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <!-- accommodation Types icon -->
                        <i class="fa-solid fa-house-circle-exclamation text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Accommodation Types</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
