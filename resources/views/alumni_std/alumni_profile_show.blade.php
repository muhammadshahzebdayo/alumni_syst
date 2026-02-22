@extends('alumni_std.layouts.app')

@section('title', 'Alumni Profile')

@section('content')
    <style>
        /* Profile Header Background */
        .profile-header-bg {
            background: linear-gradient(135deg, #335ac7 0%, rgb(112, 145, 242) 100%);
            height: 150px;
            border-radius: 20px 20px 0 0;
        }

        /* Floating Profile Card */
        .profile-card {
            margin-top: -75px;
            border: none;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        /* Vertical Connection Line (The Link Line) */
        .info-timeline {
            position: relative;
            padding-left: 30px;
        }

        .info-timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 10px;
            bottom: 10px;
            width: 2px;
            background: linear-gradient(to bottom, #4f46e5, #e5e7eb);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 25px;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            left: -35px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #4f46e5;
            border: 3px solid #fff;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        /* Social Icons Styling */
        .social-btn {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: 0.3s;
            margin: 0 5px;
            background: #f3f4f6;
            color: #4b5563;
        }

        .social-btn:hover {
            background: #4f46e5;
            color: white;
            transform: translateY(-3px);
        }
    </style>

    <div class="container my-5">
        <div class="row g-4">

            {{-- LEFT COLUMN: PROFILE OVERVIEW --}}
            <div class="col-lg-4">
                <div class="profile-header-bg"></div>
                <div class="card profile-card shadow-lg rounded-4 text-center pb-4">
                    <div class="card-body">
                        <img src="{{ $alumni->profile_photo ? asset('uploads/alumni/' . $alumni->profile_photo) : asset('images/default-avatar.png') }}"
                            class="rounded-circle border border-4 border-white shadow-sm mb-3"
                            style="width: 150px; height: 150px; object-fit: cover;">

                        <h3 class="fw-bold mb-1">{{ $alumni->first_name }} {{ $alumni->last_name }}</h3>
                        <p class="text-primary fw-semibold mb-3">{{ $alumni->designation ?? 'Distinguished Alumni' }}</p>

                        <div class="d-flex justify-content-center mb-4">
                            <span
                                class="badge bg-soft-primary text-primary px-3 py-2 rounded-pill border border-primary border-opacity-25">
                                <i class="fas fa-graduation-cap me-1"></i> Class of {{ $alumni->graduation_year }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
                            <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                            <a href="mailto:{{ $alumni->email }}" class="social-btn"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Professional Summary</h6>
                        <p class="text-muted small mb-0">
                            {{ $alumni->bio ?? 'Dedicated professional with a strong foundation from ' . ($alumni->department_name ?? 'our university') . '.' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN: LINK-LINE DETAILS --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-4 px-4 border-0">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-id-card text-primary me-2"></i> Detailed Background
                        </h5>
                    </div>
                    <div class="card-body p-4">

                        <div class="info-timeline">

                            <div class="timeline-item">
                                <h6 class="fw-bold text-dark mb-1">Current Occupation</h6>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-briefcase text-primary me-2"></i>
                                    <strong>{{ $alumni->current_job ?? 'Not Specified' }}</strong> at
                                    {{ $alumni->company_name ?? 'TBA' }}
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h6 class="fw-bold text-dark mb-1">Academic Background</h6>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-university text-primary me-2"></i>
                                    Graduated from <strong>{{ $alumni->department_name }}</strong> in
                                    {{ $alumni->graduation_year }}
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h6 class="fw-bold text-dark mb-1">Contact Details</h6>
                                <div class="row pt-2">
                                    <div class="col-md-6 mb-2">
                                        <span class="small text-muted d-block text-uppercase fw-bold">Email Address</span>
                                        <span class="text-dark">{{ $alumni->email ?? 'N/A' }}</span>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <span class="small text-muted d-block text-uppercase fw-bold">Phone Number</span>
                                        <span class="text-dark">{{ $alumni->phone_number ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <h6 class="fw-bold text-dark mb-1">Personal Details</h6>
                                <div class="row pt-2">
                                    <div class="col-md-4 mb-2">
                                        <span class="small text-muted d-block text-uppercase fw-bold">Gender</span>
                                        <span class="text-dark">{{ $alumni->gender ?? 'N/A' }}</span>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <span class="small text-muted d-block text-uppercase fw-bold">Birthday</span>
                                        <span class="text-dark">{{ $alumni->dob ?? 'N/A' }}</span>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <span class="small text-muted d-block text-uppercase fw-bold">Location</span>
                                        <span class="text-dark">{{ $alumni->address ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- <div class="mt-4 d-flex gap-2">
                    <button class="btn btn-primary px-4 rounded-pill">Connect Now</button>
                    <button class="btn btn-outline-secondary px-4 rounded-pill">Download CV</button>
                </div> --}}
            </div>

        </div>
    </div>
@endsection
