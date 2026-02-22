@php
    if (!auth()->check()) {
        header('Location: ' . route('login'));
        exit();
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Student Dashboard')</title>

    <link href="{{ asset('alumni_std/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('alumni_std/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<style>
    .profile-cover {
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        height: 120px;
        border-radius: 1rem 1rem 0 0;
    }

    .profile-img {
        margin-top: -60px;
        border: 5px solid #fff;
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

    .info-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .info-item {
        padding: 12px;
        border-radius: .75rem;
        background: #f8f9fc;
        margin-bottom: 10px;
    }

    .info-item strong {
        display: block;
        font-size: 13px;
        color: #6c757d;
    }

    .section-title {
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 15px;
        color: #4e73df;
    }

    /*
    profile page
     */
    /* ===== GLOBAL FORM POLISH ===== */
    .form-control,
    .form-select {
        border-radius: 0.75rem;
        padding: 0.6rem 0.9rem;
        border: 1px solid #d1d3e2;
        transition: all 0.2s ease-in-out;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, .15);
    }

    /* ===== SELECT DROPDOWN FIX ===== */
    .form-select {
        background-position: right 1rem center;
        background-size: 14px 10px;
        cursor: pointer;
    }

    /* ===== SECTION CARDS ===== */
    .profile-section {
        background: #f8f9fc;
        border-radius: 1rem;
        padding: 1.25rem;
        box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.04);
    }

    /* ===== HEADER GRADIENT ===== */
    .profile-header {
        background: linear-gradient(135deg, #4e73df, #224abe);
    }

    /* ===== PROFILE IMAGE ===== */
    .profile-avatar {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 4px solid #fff;
    }

    /* ===== BUTTON POLISH ===== */
    .btn {
        border-radius: 0.75rem;
    }

    .btn-primary {
        box-shadow: 0 8px 20px rgba(78, 115, 223, .25);
    }
</style>

<body id="page-top">

    <div id="wrapper">

        {{-- Sidebar --}}
        @include('alumni_std.layouts.std_sidebar')

        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- Main Content --}}
            <div id="content">

                {{-- Topbar --}}
                @include('alumni_std.layouts.std_header')

                {{-- Page Content --}}
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>

            {{-- Footer --}}
            @include('alumni_std.layouts.std_footer')

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- JS --}}
    <script src="{{ asset('alumni_std/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('alumni_std/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('alumni_std/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('alumni_std/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
