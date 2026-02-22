<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset('alumni_admin/images/avatar/2.jpg') }}"
                    alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('alumni_admin/images/avatar/2.jpg') }}"
                    alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="active">
                    <a href="{{ url('/alumni-admin/admin-index') }}">
                        <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>

                <h3 class="menu-title">Alumni Management</h3>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-laptop"></i>Graduated Alumni
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list-ul"></i><a href="{{ url('alumni-admin/tables-data') }}">View/Edit
                                Alumni</a></li>
                        <li><i class="fa fa-plus-square"></i><a href="{{ url('alumni-admin/add-alumni') }}">Add
                                Alumni</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-table"></i>Content Management
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-envelope-o"></i><a href="{{ url('alumni-admin/post-news') }}">Post News</a>
                        </li>
                        <li><i class="fa fa-calendar"></i><a href="{{ url('alumni-admin/post-events') }}">Publish
                                Events</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-users"></i>User & Role Management
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-card-o"></i><a href="{{ url('alumni-admin/view-roles') }}">Users &
                                Roles</a></li>
                        <li><i class="fa fa-plus-circle"></i><a href="{{ url('alumni-admin/create-role') }}">Create
                                Role</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Career & Networking</h3>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-briefcase"></i>Jobs & Careers
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-paper-plane-o"></i><a href="{{ url('alumni-admin/post-job') }}">Post Job</a>
                        </li>
                        <li><i class="fa fa-building-o"></i><a
                                href="{{ url('alumni-admin/alumni-indusries') }}">Industries</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-info-circle"></i>System Guide
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-code"></i><a
                                href="{{ url('alumni-admin/installation-guide') }}">Installation</a></li>
                        <li><i class="fa fa-book"></i><a href="{{ url('alumni-admin/user-guide') }}">User Guide</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</aside>

<style>
    /* Admin Panel Matched Colors */
    .left-panel {
        background: #272c33 !important;
        /* Standard Admin Dark Grey/Slate */
        min-height: 100vh;
    }

    .navbar {
        background: #272c33 !important;
        border: none !important;
        padding: 0 !important;
    }

    .navbar .menu-title {
        color: #7e8d9f !important;
        /* Muted text for section headers */
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 20px 20px 5px 25px;
    }

    .navbar .navbar-nav li>a {
        color: #c8c9ce !important;
        /* Standard Sidebar Link Color */
        font-family: 'Open Sans', sans-serif;
        font-size: 14px;
        padding: 10px 15px 10px 25px !important;
    }

    /* Hover & Active Match with sufee/ela Admin Dashboard */
    .navbar .navbar-nav li>a:hover,
    .navbar .navbar-nav li.active>a {
        color: #fff !important;
        background: #1f2328 !important;
        /* Slightly darker than sidebar background */
    }

    .navbar .navbar-nav li.active .menu-icon,
    .navbar .navbar-nav li>a:hover .menu-icon {
        color: #03a9f3 !important;
        /* The blue accent color of most dashboards */
    }

    .menu-icon {
        color: #8b939b !important;
        width: 20px !important;
        margin-right: 10px !important;
    }

    /* Submenu background match */
    .sub-menu {
        background: #272c33 !important;
        padding-left: 15px !important;
    }

    .sub-menu li i {
        font-size: 12px !important;
        color: #8b939b !important;
    }

    .sub-menu li a {
        color: #c8c9ce !important;
    }

    .sub-menu li a:hover {
        color: #fff !important;
    }
</style>


{{--  this is previous panel for use case --}}
<!-- Left Panel

 <aside id="left-panel" class="left-panel">
     <nav class="navbar navbar-expand-sm navbar-default">

         <div class="navbar-header">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                 aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                 <i class="fa fa-bars"></i>
             </button>
             <a class="navbar-brand " href=""><img src="{{ asset('alumni_admin/images/avatar/2.jpg') }}"
                     alt="Logo"></a>
             <a class="navbar-brand hidden " href=""><img src="{{ asset('alumni_admin/images/avatar/2.jpg') }}"
                     alt="Logo"></a>
         </div>

         <div id="main-menu" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                 <li class="active">
                     <a href="{{ url('/alumni-admin/admin-index') }}"> <i
                             class="menu-icon fa fa-dashboard"></i>Dashboard
                     </a>
                 </li>
                 <h3 class="menu-title">Alumni Management</h3>
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>graduated alumni</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('alumni-admin/tables-data') }}">view/edit
                                 alumni</a></li>
                         <li><i class="fa fa-id-badge"></i><a href="{{ url('alumni-admin/add-alumni') }}">add
                                 alumni</a></li>

                     </ul>
                 </li>
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Content Management</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="fa fa-table"></i><a href="{{ url('alumni-admin/post-news') }}">Post
                                 News-Announcements.</a></li>
                         <li><i class="fa fa-table"></i><a href="{{ url('alumni-admin/post-events') }}">publish
                                 events</a>
                         </li>
                     </ul>
                 </li>
                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-th"></i>user & role managment</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-th"></i><a href="{{ url('alumni-admin/view-roles') }}"> users &
                                 roles</a>
                         </li>
                         {{-- <li><i class="menu-icon fa fa-th"></i><a
                                href="{{ url('alumni-admin/role-assign') }}">role-assign
                            </a>
                        </li> --}}
                         <li><i class="menu-icon fa fa-th"></i><a href="{{ url('alumni-admin/create-role') }}">create
                                 role
                             </a>
                         </li>
                     </ul>
                 </li>


                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Career & Networking</a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-line-chart"></i><a href="{{ url('alumni-admin/post-job') }}">post
                                 job/
                                 Internship</a>
                         </li>

                         <li><i class="menu-icon fa fa-area-chart"></i><a
                                 href="{{ url('alumni-admin/alumni-indusries') }}">Our Alumni Industries</a>
                         </li>
                     </ul>
                 </li>

                 <li class="menu-item-has-children dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Installation & guide </a>
                     <ul class="sub-menu children dropdown-menu">
                         <li><i class="menu-icon fa fa-area-chart"></i><a
                                 href="{{ url('alumni-admin/installation-guide') }}">Installation Guide</a>
                         </li>
                         <li><i class="menu-icon fa fa-area-chart"></i><a
                                 href="{{ url('alumni-admin/user-guide') }}">User Guide</a>
                         </li>
                     </ul>
                 </li>

             </ul>
         </div>
     </nav>
 </aside>
 - Left Panel -->
