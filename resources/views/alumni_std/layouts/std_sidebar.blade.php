<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: linear-gradient(180deg, #1e40af 0%, #2563eb 100%); border-right: 1px solid rgba(255,255,255,0.1);">

    <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="{{ url('alumni_std/index') }}">
        <div class="sidebar-brand-icon">
            <div class="bg-white rounded-circle d-flex align-items-center justify-content-center"
                style="width: 45px; height: 45px;">
                <i class="fas fa-user-graduate text-primary"></i>
            </div>
        </div>
        <div class="sidebar-brand-text mx-3 fw-bold tracking-wider" style="font-size: 1.1rem; letter-spacing: 1px;">
            ALUMNI <span class="fw-light">HUB</span></div>
    </a>

    <hr class="sidebar-divider my-0 opacity-25">

    <li class="nav-item {{ Request::is('alumni_std/index') ? 'active' : '' }} mt-3">
        <a class="nav-link rounded-pill mx-2 {{ Request::is('alumni_std/index') ? 'bg-white text-primary shadow' : '' }}"
            href="{{ url('alumni_std/index') }}">
            <i
                class="fas fa-fw fa-tachometer-alt {{ Request::is('alumni_std/index') ? 'text-primary' : 'text-white-50' }}"></i>
            <span class="fw-bold">Dashboard</span>
        </a>
    </li>

    <div class="sidebar-heading mt-4 mb-2 text-white-50 small fw-bold text-uppercase px-4" style="font-size: 0.65rem;">
        Main Menu
    </div>

    <li class="nav-item {{ Request::is('alumni_std/profile*') ? 'active' : '' }}">
        <a class="nav-link rounded-pill mx-2 {{ Request::is('alumni_std/profile*') ? 'bg-white text-primary shadow' : '' }}"
            href="{{ url('alumni_std/profile') }}">
            <i class="fas fa-user {{ Request::is('alumni_std/profile*') ? 'text-primary' : 'text-white-50' }}"></i>
            <span class="fw-bold">My Profile</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('alumni_std/alumni_directory*') ? 'active' : '' }}">
        <a class="nav-link rounded-pill mx-2 {{ Request::is('alumni_std/alumni_directory*') ? 'bg-white text-primary shadow' : '' }}"
            href="{{ url('alumni_std/alumni_directory') }}">
            <i
                class="fas fa-users {{ Request::is('alumni_std/alumni_directory*') ? 'text-primary' : 'text-white-50' }}"></i>
            <span class="fw-bold">Alumni Directory</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('alumni_std/jobs*') ? 'active' : '' }}">
        <a class="nav-link rounded-pill mx-2 {{ Request::is('alumni_std/jobs*') ? 'bg-white text-primary shadow' : '' }}"
            href="{{ url('alumni_std/jobs') }}">
            <i class="fas fa-briefcase {{ Request::is('alumni_std/jobs*') ? 'text-primary' : 'text-white-50' }}"></i>
            <span class="fw-bold">Jobs & Internships</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('alumni_std/events*') ? 'active' : '' }}">
        <a class="nav-link rounded-pill mx-2 {{ Request::is('alumni_std/events*') ? 'bg-white text-primary shadow' : '' }}"
            href="{{ url('alumni_std/events') }}">
            <i
                class="fas fa-calendar-alt {{ Request::is('alumni_std/events*') ? 'text-primary' : 'text-white-50' }}"></i>
            <span class="fw-bold">Events Portal</span>
        </a>
    </li>

    <hr class="sidebar-divider mt-4 opacity-25">

    <li class="nav-item">
        <a class="nav-link rounded-pill mx-2 hover-danger" href="{{ url('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt text-white-50"></i>
            <span class="fw-bold">Logout</span>
        </a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

    {{-- <div class="text-center d-none d-md-inline mt-5">
        <button class="rounded-circle border-0 shadow-sm" id="sidebarToggle"
            style="background-color: rgba(255,255,255,0.2); color: white;"></button>
    </div> --}}

</ul>

<style>
    /* Active Link Styles */
    #accordionSidebar .nav-item.active .nav-link {
        color: #2563eb !important;
        background-color: #ffffff !important;
        margin-left: 15px !important;
        margin-right: 15px !important;
        transition: all 0.3s ease;
    }

    /* Hover effect for links */
    #accordionSidebar .nav-link:hover:not(.bg-white) {
        background-color: rgba(255, 255, 255, 0.1);
        margin-left: 15px !important;
        margin-right: 15px !important;
        border-radius: 50px;
    }

    .hover-danger:hover {
        background-color: rgba(239, 68, 68, 0.2) !important;
    }

    /* Adjusting Brand Icon */
    .sidebar-brand-icon i {
        font-size: 1.2rem;
    }
</style>
