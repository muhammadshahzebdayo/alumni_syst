<nav class="navbar navbar-expand bg-white navbar-light sticky-top px-4 py-2 shadow-sm main-header">
    <a href="#" class="sidebar-toggler flex-shrink-0 text-decoration-none">
        <div class="toggle-icon-box">
            <i class="fa fa-bars text-primary"></i>
        </div>
    </a>

    <div class="ms-3 d-none d-md-block">
        <h5 class="fw-bold mb-0 text-dark">Recruiter <span class="text-primary">Panel</span></h5>
    </div>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item me-3">
            <a href="#" class="nav-link position-relative p-2 rounded-circle hover-effect">
                <i class="fa fa-bell text-muted"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    style="font-size: 0.6rem;">
                    3
                </span>
            </a>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center p-1 rounded-pill profile-pill"
                data-bs-toggle="dropdown">
                <img class="rounded-circle border border-2 border-white shadow-sm"
                    src="{{ asset('alumni_faculty/img/user.jpg') }}"
                    style="width:38px; height:38px; object-fit: cover;">
                <div class="ms-2 d-none d-lg-block me-1">
                    <span class="fw-bold text-dark small">John Doe</span>
                    <p class="text-muted mb-0" style="font-size: 10px; margin-top: -3px;">HR Manager</p>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-3 py-2 px-2 profile-dropdown">
                <a href="{{ route('job_recruiter.company_profile') }}" class="dropdown-item rounded-3 py-2 mb-1">
                    <i class="fa fa-user-circle me-2 text-primary"></i> My Profile
                </a>
                <!--{{-- <a href="#" class="dropdown-item rounded-3 py-2 mb-1">
                    <i class="fa fa-cog me-2 text-primary"></i> Account Settings
                </a> --}} -->
                <div class="dropdown-divider opacity-50"></div>
                <a href="{{ route('logout') }}" class="dropdown-item rounded-3 py-2 text-danger">
                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Header Styling */
    .main-header {
        border-bottom: 1px solid #f1f5f9;
        z-index: 1000;
    }

    /* Toggle Button Style */
    .toggle-icon-box {
        width: 350px;
        height: 40px;
        background: #f0f7ff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        transition: 0.3s;
    }

    .toggle-icon-box:hover {
        background: #2563eb;
    }

    .toggle-icon-box:hover i {
        color: white !important;
    }

    /* Profile Pill */
    .profile-pill {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        transition: 0.3s;
    }

    .profile-pill:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }

    /* Dropdown Styling */
    .profile-dropdown {
        border-radius: 15px !important;
        min-width: 200px;
        animation: slideDown 0.3s ease-out;
    }

    .profile-dropdown .dropdown-item:hover {
        background-color: #f0f7ff;
        color: #2563eb;
    }

    /* Notification & Icons hover */
    .hover-effect:hover {
        background-color: #f1f5f9;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>


<!--
{{-- <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('alumni_faculty/img/user.jpg') }}"
                    style="width:40px;height:40px;">
                <span class="d-none d-lg-inline-flex">John Doe</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0">
                <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Logout</a>
            </div>
        </div>
    </div>
</nav> --}}
-->
