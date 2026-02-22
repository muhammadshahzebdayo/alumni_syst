<div class="sidebar pe-4 pb-3 shadow-sm border-end">
    <nav class="navbar bg-white navbar-light">
        <a href="{{ url('/job_recruiter/index') }}" class="navbar-brand mx-4 mb-3 mt-4">
            <div class="logo-container">
                <i class="fa fa-gem text-primary me-2"></i>
                <span class="brand-text">ALUMNI<span class="text-primary">PRO</span></span>
            </div>
        </a>

        <div class="mx-4 mb-4 p-3 rounded-4 recruiter-profile-card-light">
            <div class="d-flex align-items-center">
                <div class="position-relative">
                    <img class="rounded-circle border border-2 border-primary p-1 shadow-sm"
                        src="{{ asset('alumni_faculty/img/user.jpg') }}"
                        style="width:50px; height:50px; object-fit: cover;">
                    <span class="online-dot"></span>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 fw-bold text-dark">{{ Auth::user()->name ?? 'Recruiter' }}</h6>
                    <span class="badge bg-soft-primary text-primary mt-1" style="font-size: 9px;">VERIFIED HR</span>
                </div>
            </div>
        </div>

        <div class="navbar-nav w-100 px-3">
            <a href="{{ url('/job_recruiter/index') }}"
                class="nav-item nav-link {{ Request::is('job_recruiter/index') ? 'active' : '' }} mb-1">
                <i class="fa fa-chart-pie me-2"></i>Dashboard
            </a>

            <div class="nav-label mt-4 mb-2 ms-3">Recruitment Lifecycle</div>

            <a href="{{ url('job_recruiter/create') }}"
                class="nav-item nav-link {{ Request::is('job_recruiter/create') ? 'active' : '' }} mb-1">
                <i class="fa fa-pen-nib me-2"></i>Post New Vacancy
            </a>

            <a href="{{ url('job_recruiter/posts') }}"
                class="nav-item nav-link {{ Request::is('job_recruiter/posts') ? 'active' : '' }} mb-1">
                <i class="fa fa-briefcase me-2"></i>Manage Postings
            </a>

            <a href="{{ url('job_recruiter/application_view') }}"
                class="nav-item nav-link {{ Request::is('job_recruiter/application_view') ? 'active' : '' }} mb-1">
                <i class="fa fa-user-check me-2"></i>Review Applicants
                <span class="badge bg-danger rounded-pill float-end mt-1 shadow-sm" style="font-size: 10px;">9+</span>
            </a>

            <div class="nav-label mt-4 mb-2 ms-3">company profile</div>
            <a href="{{ url('job_recruiter/company_profile') }}"
                class="nav-item nav-link {{ Request::is('job_recruiter/company_profile') ? 'active' : '' }} mb-1">
                <i class="fa fa-user-check me-2"></i> view profile
                {{-- <span class="badge bg-danger rounded-pill float-end mt-1 shadow-sm" style="font-size: 10px;">9+</span> --}}
            </a>
            {{-- <a href="{{ url('job_recruiter/company_profile') }} " class="nav-item nav-link mb-1">
                <i class="fa fa-building me-2"></i>Company Profile
            </a> --}}

            <hr class="mx-3 my-4 opacity-50">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="nav-item nav-link text-danger border-0 bg-transparent w-100 text-start logout-hover">
                    <i class="fa fa-sign-out-alt me-2"></i>Sign Out
                </button>
            </form>
        </div>
    </nav>
</div>

<style>
    /* White Theme Sidebar */
    .sidebar {
        background: #ffffff !important;
        /* Pure White */
        min-height: 100vh;
        z-index: 10;
        transition: 0.5s;
    }

    /* Logo Styling */
    .brand-text {
        font-weight: 800;
        color: #0f172a;
        /* Dark text for light bg */
        letter-spacing: 1px;
        font-size: 1.2rem;
    }

    /* Light Profile Card */
    .recruiter-profile-card-light {
        background: #f8fafc;
        /* Hash White / Very Light Gray */
        border: 1px solid #e2e8f0;
    }

    .online-dot {
        position: absolute;
        bottom: 3px;
        right: 3px;
        width: 12px;
        height: 12px;
        background: #10b981;
        border: 2px solid #ffffff;
        border-radius: 50%;
    }

    /* Nav Labels */
    .nav-label {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #94a3b8;
        font-weight: 700;
    }

    /* Light Mode Links */
    .nav-item.nav-link {
        color: #64748b !important;
        /* Slate gray */
        border-radius: 10px;
        padding: 12px 18px !important;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-item.nav-link:hover {
        background: #f1f5f9;
        color: #2563eb !important;
        transform: translateX(5px);
    }

    .nav-item.nav-link.active {
        background: #eff6ff !important;
        /* Very Light Blue */
        color: #2563eb !important;
        /* Bright Blue Text */
        font-weight: 600;
        border-right: 4px solid #2563eb;
        border-radius: 10px 0 0 10px;
        /* Sharp right for active effect */
    }

    /* Badges */
    .bg-soft-primary {
        background: rgba(37, 99, 235, 0.1);
    }

    .logout-hover:hover {
        background: #fff1f2 !important;
        /* Soft Red bg */
        color: #e11d48 !important;
    }
</style>

<!-- {{-- <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="#" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                <i class="fa fa-hashtag me-2"></i>DASHMIN
            </h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4">
            <img class="rounded-circle" src="{{ asset('alumni_faculty/img/user.jpg') }}" style="width:40px;height:40px;">
            <div class="ms-3">
                <h6 class="mb-0">John Doe</h6>
                <span>Admin</span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <a href="#" class="nav-item nav-link active">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
        </div>
    </nav>
</div> --}}
-->
