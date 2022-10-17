<!--//page-header//-->
<header class="navbar py-0 page-header border-bottom navbar-expand navbar-light px-4">
    <a href="/" class="navbar-brand d-block d-lg-none">
        <div class="d-flex align-items-center flex-no-wrap text-truncate">
            <!--Sidebar-icon-->
            <img src="{{ asset('assets/media/logo.svg') }}">
        </div>
    </a>
    <ul class="navbar-nav d-flex align-items-center h-100">
        <li class="nav-item d-none d-lg-flex flex-column h-100 me-lg-2 align-items-center justify-content-center">
            <a href="javascript:void(0)"
                class="sidebar-trigger nav-link rounded-3 size-35 d-flex align-items-center justify-content-center p-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" width="16"
                    height="16">
                    <path fill-rule="evenodd"
                        d="M7.78 12.53a.75.75 0 01-1.06 0L2.47 8.28a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 1.06L4.81 7h7.44a.75.75 0 010 1.5H4.81l2.97 2.97a.75.75 0 010 1.06z">
                    </path>
                </svg>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ms-auto d-flex align-items-center h-100">
        <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100 me-lg-1">
            <div class="switch_modes">

                {{-- @if (Session::get('theme') == 'light') --}}
                <a href="#" class="mode_dark active nav-link" title="Dark" onclick="addCss('dark')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd"
                            d="M9.598 1.591a.75.75 0 01.785-.175 7 7 0 11-8.967 8.967.75.75 0 01.961-.96 5.5 5.5 0 007.046-7.046.75.75 0 01.175-.786zm1.616 1.945a7 7 0 01-7.678 7.678 5.5 5.5 0 107.678-7.678z"
                            fill="currentColor"></path>
                    </svg>
                </a>
                {{-- @else --}}
                <a href="#" class="mode_light nav-link" title="Light" onclick="addCss('light')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd"
                            d="M8 10.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM8 12a4 4 0 100-8 4 4 0 000 8zM8 0a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0V.75A.75.75 0 018 0zm0 13a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 018 13zM2.343 2.343a.75.75 0 011.061 0l1.06 1.061a.75.75 0 01-1.06 1.06l-1.06-1.06a.75.75 0 010-1.06zm9.193 9.193a.75.75 0 011.06 0l1.061 1.06a.75.75 0 01-1.06 1.061l-1.061-1.06a.75.75 0 010-1.061zM16 8a.75.75 0 01-.75.75h-1.5a.75.75 0 010-1.5h1.5A.75.75 0 0116 8zM3 8a.75.75 0 01-.75.75H.75a.75.75 0 010-1.5h1.5A.75.75 0 013 8zm10.657-5.657a.75.75 0 010 1.061l-1.061 1.06a.75.75 0 11-1.06-1.06l1.06-1.06a.75.75 0 011.06 0zm-9.193 9.193a.75.75 0 010 1.06l-1.06 1.061a.75.75 0 11-1.061-1.06l1.06-1.061a.75.75 0 011.061 0z"
                            fill="currentColor"></path>
                    </svg>
                </a>
                {{-- @endif --}}
            </div>
        </li>


        <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100">
            <a href="#"
                class="nav-link dropdown-toggle rounded-pill p-1 lh-1 pe-1 pe-md-2 d-flex align-items-center justify-content-center"
                aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                <div class="d-flex align-items-center">

                    <!--Avatar with status-->
                    <div class="avatar-status status-online me-1 avatar sm">
                        <img src="{{ asset('assets/media/avatars/01.jpg') }}" class="rounded-circle img-fluid"
                            alt="">
                    </div>
                </div>
            </a>

            <div class="dropdown-menu mt-0 p-0 dropdown-menu-end overflow-hidden">
                <!--User meta-->
                <div class="position-relative overflow-hidden p-4 bg-gradient-dark text-white">
                    <div class="position-relative">
                        <h5 class="mb-1">Adam Milne</h5>
                        <p class="text-muted small mb-0 lh-1">Marketing head</p>
                    </div>
                </div>
                <div class="p-2">
                    {{-- <a href="profile.html" class="dropdown-item">
                        <i class="fas fa-user opacity-50 align-middle me-2"></i>Profile</a>
                    <a href="account-general.html" class="dropdown-item">
                        <i class="fas fa-cogs opacity-50 align-middle me-2"></i>Settings</a>
                    <a href="page-tasks.html" class="dropdown-item">
                        <i class="fas fa-list opacity-50 align-middle me-2"></i>Tasks</a> --}}
                    <hr class="mt-3 mb-1">
                    <a href="{{ route('logout') }}" class="dropdown-item d-flex align-items-center">
                        <i class="fas fa-sign-out-alt opacity-50 align-middle me-2"></i>
                        Sign out
                    </a>
                </div>
            </div>
        </li>
        <li
            class="nav-item dropdown ms-1 ms-lg-3 d-flex d-lg-none align-items-center justify-content-center flex-column h-100">
            <a href="#"
                class="nav-link sidebar-trigger-lg-down size-35 p-0 d-flex align-items-center justify-content-center rounded-3">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
</header>
<!--Main Header End-->
