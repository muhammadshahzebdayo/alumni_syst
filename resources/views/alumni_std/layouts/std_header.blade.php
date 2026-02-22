<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm px-4"
    style="border-bottom: 1px solid #e2e8f0; height: 70px;">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-primary bg-light">
        <i class="fa fa-bars"></i>
    </button>

    <div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
        <h6 class="mb-0 text-gray-800 fw-bold">Alumni Portal <span class="text-primary mx-1">|</span> <small
                class="text-muted">Student Panel</small></h6>
    </div>

    <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item mx-1">
            <a class="nav-link text-gray-400" href="#"><i class="fas fa-bell fa-fw"></i></a>
        </li>

        <div class="topbar-divider d-none d-sm-block mx-3" style="border-right: 1px solid #e2e8f0; height: 1.5rem;">
        </div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center bg-light rounded-pill px-3 py-1 hover-profile transition"
                href="javascript:void(0)" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" style="height: 45px;">

                <div class="text-right mr-2 d-none d-lg-inline">
                    <span class="text-gray-800 small fw-bold d-block lh-1">{{ Auth::user()->first_name ?? ' guest ' }}
                        {{ Auth::user()->last_name ?? 'user' }}</span>
                    <small class="text-primary fw-bold" style="font-size: 0.65rem; text-uppercase: uppercase;">Alumni
                        Member</small>
                </div>

                <div class="position-relative">
                    <img class="img-profile rounded-circle border border-white shadow-sm"
                        src="{{ asset('alumni_std/img/undraw_profile_1.svg') }}" alt="Profile"
                        style="width:35px; height:35px; object-fit: cover;">
                    <span class="position-absolute bottom-0 right-0 p-1 bg-success border border-white rounded-circle"
                        style="width: 10px; height: 10px;"></span>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow border-0 animated--fade-in mt-2 p-2 custom-dropdown-menu"
                aria-labelledby="userDropdown" style="border-radius: 15px; min-width: 200px;">

                <div class="px-3 py-2 border-bottom mb-2">
                    <p class="small text-muted mb-0">Logged in as</p>
                    <p class="small fw-bold text-dark mb-0">
                        {{ Auth::user()->email ?? 'Guest User' }}
                    </p>
                </div>

                <a class="dropdown-item rounded-pill mb-1" href="{{ url('alumni_std/profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-3 text-primary"></i>
                    <span class="fw-bold small">My Profile</span>
                </a>

                <a class="dropdown-item rounded-pill mb-1 text-danger" href="{{ url('/logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-3 text-danger"></i>
                    <span class="fw-bold small">Logout</span>
                </a>

                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<style>
    /* Topbar Matching Styles */
    .hover-profile:hover {
        background-color: #f1f5f9 !important;
        text-decoration: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item:active {
        background-color: #2563eb !important;
        color: white !important;
    }

    .dropdown-item:active i {
        color: white !important;
    }

    .transition {
        transition: all 0.2s ease-in-out;
    }

    /* Animation */
    .animated--fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Dropdown Force Show Class */
    .custom-dropdown-menu.show {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0px) !important;
    }

    .hover-profile:hover {
        background-color: #f1f5f9 !important;
        text-decoration: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item:hover {
        background-color: #f8fafc;
        color: #2563eb;
    }

    .transition {
        transition: all 0.2s ease-in-out;
    }

    .animated--fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Dropdown toggle handle
        $('#userDropdown').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            // Sab dropdowns ko pehle close karo phir isko toggle karo
            $('.dropdown-menu').not($(this).next()).removeClass('show');
            $(this).next('.dropdown-menu').toggleClass('show');
        });

        // Click bahar ho to dropdown band ho jaye
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nav-item.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });
    });
</script>
