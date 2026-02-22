@php
    if (!auth()->check()) {
        header('Location: ' . route('login'));
        exit();
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Alumni System' }}</title>
    @stack('css')
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/jqvmap/dist/jqvmap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('alumni_admin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body>

    <body>

        @include('layouts.ad_sidebar')

        <div id="right-panel" class="right-panel">

            @include('layouts.ad_header')

            <main class="content-wrapper">
                @yield('content')
            </main>

            <div class="clearfix"></div>

            <footer class="site-footer bg-white border-top py-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            Copyright &copy; {{ date('Y') }} Alumni Management System
                        </div>
                        <div class="col-sm-6 text-right">
                            Designed by <a href="#">G M software Solutions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @stack('js')
        <script src="{{ asset('alumni_admin/vendors/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('alumni_admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('alumni_admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('alumni_admin/assets/js/main.js') }}"></script>

        @stack('scripts')

    </body>

</html>
