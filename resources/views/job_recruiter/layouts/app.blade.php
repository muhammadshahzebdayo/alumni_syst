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
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('alumni_faculty/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('alumni_faculty/css/style.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        {{-- SIDEBAR --}}
        @include('job_recruiter.layouts.hr_sidebar')

        <div class="content">

            {{-- HEADER --}}
            @include('job_recruiter.layouts.hr_header')

            {{-- MAIN CONTENT --}}
            <main class="px-4 pt-4">
                @yield('content')
            </main>

            {{-- FOOTER --}}
            @include('job_recruiter.layouts.hr_footer')

        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('alumni_faculty/js/main.js') }}"></script>

    @stack('js')
</body>

</html>
