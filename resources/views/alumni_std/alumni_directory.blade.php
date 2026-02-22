@extends('alumni_std.layouts.app')

@section('title', 'Alumni Directory')

@section('content')
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #5481ec 0%, #3c64c0 100%);
            --card-bg: #ffffff;
        }

        body {
            background-color: #f3f4f6;
        }

        /* Page Header Styling */
        .directory-banner {
            background: var(--primary-gradient);
            border-radius: 20px;
            padding: 50px 20px;
            color: white;
            margin-bottom: 50px;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }

        /* Card Styling */
        .alumni-card {
            border: none;
            border-radius: 20px;
            background: var(--card-bg);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            z-index: 1;
        }

        .alumni-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12) !important;
        }

        /* Image Container with Ring */
        .img-wrapper {
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 auto 20px;
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .img-wrapper::after {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: var(--primary-gradient);
            border-radius: 50%;
            z-index: -1;
        }

        /* Badge & Text */
        .batch-tag {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: #f3f0ff;
            color: #7c3aed;
            padding: 4px 12px;
            border-radius: 50px;
            font-weight: 700;
        }

        .dept-text {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Glass Button */
        .btn-profile {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-profile:hover {
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
            color: white;
            opacity: 0.9;
        }
    </style>

    <div class="container py-5">
        <div class="directory-banner text-center shadow">
            <h1 class="fw-extrabold display-5">Alumni Network</h1>
            <p class="lead opacity-75">Connect with professionals, mentors, and fellow graduates.</p>
        </div>

        <div class="row g-4">
            @foreach ($alumni as $a)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="card alumni-card shadow-sm h-100 p-3">
                        <div class="card-body d-flex flex-column align-items-center">

                            <div class="mb-3">
                                <span class="batch-tag">Class of {{ $a->graduation_year }}</span>
                            </div>

                            <div class="img-wrapper">
                                <img src="{{ asset('uploads/alumni/' . $a->profile_photo) }}" alt="Profile">
                            </div>

                            <h5 class="fw-bold text-dark mb-1">{{ $a->first_name }} {{ $a->last_name }}</h5>

                            <p class="dept-text mb-3">
                                <i class="bi bi-mortarboard-fill me-1"></i> {{ $a->department_name }}
                            </p>

                            <div class="text-center mb-4 flex-grow-1">
                                <p class="small text-muted mb-0">
                                    <span class="d-block fw-bold text-uppercase text-xs"
                                        style="font-size: 0.65rem; color: #9ca3af;">Current Role</span>
                                    <span class="text-dark">{{ $a->current_job ?? 'Exploring Opportunities' }}</span>
                                </p>
                            </div>

                            <div class="w-100">
                                <a href="{{ route('alumni_std.alumni_profile_show', $a->alumni_id) }}"
                                    class="btn btn-profile w-100 shadow-sm">
                                    View Directory
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
