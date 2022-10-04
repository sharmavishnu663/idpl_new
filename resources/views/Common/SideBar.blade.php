<!--///////////Page sidebar begin///////////////-->
<aside class="page-sidebar">
    <div class="h-100 flex-column d-flex" data-simplebar>
        <!--Aside-logo-->
        <div class="aside-logo p-3 position-relative">
            <a href="index.html" class="d-block pe-2">
                <div class="d-flex align-items-center flex-no-wrap text-truncate">
                    <!--Sidebar-icon-->
                    <span class="sidebar-icon fs-5 lh-1 text-white rounded-circle bg-primary">
                        <svg width="16" height="18" viewBox="0 0 11 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.399994" width="4" height="12" fill="white" />
                            <path
                                d="M5.89998 9.6C7.1465 9.6 8.34196 9.09429 9.22338 8.19411C10.1048 7.29394 10.6 6.07304 10.6 4.8C10.6 3.52696 10.1048 2.30606 9.22338 1.40589C8.34196 0.505713 7.1465 2.4787e-07 5.89998 0L5.89998 4.8L5.89998 9.6Z"
                                fill="white" />
                        </svg>
                    </span>
                    <span class="sidebar-text">
                        <!--Sidebar-text-->
                        <span class="sidebar-text text-truncate fs-4 text-uppercase fw-bolder">
                            Panel
                        </span>
                    </span>
                </div>
            </a>
        </div>
        <!--Aside-Menu-->
        <div class="aside-menu pe-2 my-auto flex-column-fluid">
            <nav class="flex-grow-1 h-100" id="page-navbar">
                <!--:Sidebar nav-->
                <ul class="nav flex-column collapse-group collapse d-flex pt-4">
                    <li class="nav-item sidebar-title text-truncate opacity-50 small">
                        <i class="fas fa-ellipsis-h align-middle"></i>
                        <span>Main</span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" data-bs-toggle=""
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.dashboard' ? 'active' : '' }} "
                            aria-expanded="false">
                            <!--Sidebar nav text-->
                            <span class="sidebar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path
                                        d="M12.97 2.59a1.5 1.5 0 00-1.94 0l-7.5 6.363A1.5 1.5 0 003 10.097V19.5A1.5 1.5 0 004.5 21h4.75a.75.75 0 00.75-.75V14h4v6.25c0 .414.336.75.75.75h4.75a1.5 1.5 0 001.5-1.5v-9.403a1.5 1.5 0 00-.53-1.144l-7.5-6.363z">
                                    </path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.gallary') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.gallary' ? 'active' : '' }} ">
                            <span class="sidebar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16"
                                    height="16">
                                    <path fill-rule="evenodd"
                                        d="M4.177 7.823l2.396-2.396A.25.25 0 017 5.604v4.792a.25.25 0 01-.427.177L4.177 8.177a.25.25 0 010-.354z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v12.5A1.75 1.75 0 0114.25 16H1.75A1.75 1.75 0 010 14.25V1.75zm1.75-.25a.25.25 0 00-.25.25v12.5c0 .138.112.25.25.25H9.5v-13H1.75zm12.5 13H11v-13h3.25a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25z">
                                    </path>
                                </svg>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Gallery</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.privacy_policy') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.privacy_policy' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path
                                        d="M0 48C0 21.5 21.5 0 48 0H336c26.5 0 48 21.5 48 48V207l-42.4 17H304 272c-8.8 0-16 7.2-16 16v32 24.2V304c0 .9 .1 1.7 .2 2.6c2.3 58.1 24.1 144.8 98.7 201.5c-5.8 2.5-12.2 3.9-18.9 3.9H240V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H48c-26.5 0-48-21.5-48-48V48zM80 224c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm80 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zM64 112v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zM176 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H176zm80 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H272c-8.8 0-16 7.2-16 16zM423.1 225.7c5.7-2.3 12.1-2.3 17.8 0l120 48C570 277.4 576 286.2 576 296c0 63.3-25.9 168.8-134.8 214.2c-5.9 2.5-12.6 2.5-18.5 0C313.9 464.8 288 359.3 288 296c0-9.8 6-18.6 15.1-22.3l120-48zM527.4 312L432 273.8V461.7c68.2-33 91.5-99 95.4-149.7z" />
                                </svg>

                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Privacy Policy</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.terms') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.terms' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path
                                        d="M0 48C0 21.5 21.5 0 48 0H336c26.5 0 48 21.5 48 48V207l-42.4 17H304 272c-8.8 0-16 7.2-16 16v32 24.2V304c0 .9 .1 1.7 .2 2.6c2.3 58.1 24.1 144.8 98.7 201.5c-5.8 2.5-12.2 3.9-18.9 3.9H240V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H48c-26.5 0-48-21.5-48-48V48zM80 224c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm80 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zM64 112v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zM176 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H176zm80 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H272c-8.8 0-16 7.2-16 16zM423.1 225.7c5.7-2.3 12.1-2.3 17.8 0l120 48C570 277.4 576 286.2 576 296c0 63.3-25.9 168.8-134.8 214.2c-5.9 2.5-12.6 2.5-18.5 0C313.9 464.8 288 359.3 288 296c0-9.8 6-18.6 15.1-22.3l120-48zM527.4 312L432 273.8V461.7c68.2-33 91.5-99 95.4-149.7z" />
                                </svg>

                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Terms</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.contact.address') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.contact.address' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="far fa-address-book"></i>

                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Contact Address</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.team') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.team' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa fa-solid fa-user-plus"></i>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Team</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.about.video') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.about.video' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa fa-solid fa-video"></i>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">About Video</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.career.video') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.career.video' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa fa-solid fa-video"></i>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Careers Video</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.user.counts') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.user.counts' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa fa-solid fa-calculator"></i>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">User Counts</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.user.testimonial') }}" data-bs-toggle="" aria-expanded="false"
                            class="nav-link d-flex align-items-center text-truncate {{ Route::current()->getName() == 'admin.user.testimonial' ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa fa-duotone fa-comments"></i>
                            </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">User Testimonial</span>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
        <!--Aside-footer-->

    </div>
</aside>
<!--///////////Page Sidebar End///////////////-->

<!--///Sidebar close button for 991px or below devices///-->
<div class="sidebar-close d-lg-none">
    <a href="#"></a>
</div>
<!--///.Sidebar close end///-->
