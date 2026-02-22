@extends('alumni_std.layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="container py-4">

        <div class="row g-4">

            <!-- LEFT PROFILE -->
            <div class="col-lg-4">

                <div class="card info-card text-center">
                    <div class="profile-cover"></div>

                    <div class="card-body">

                        <img src="{{ $request_profile->profile_photo
                            ? asset('uploads/profile/' . $request_profile->profile_photo)
                            : asset('images/default-avatar.png') }}"
                            class="rounded-circle profile-img mb-2">

                        <h4 class="fw-bold mt-2">
                            {{ $request_profile->first_name }} {{ $request_profile->last_name }}
                        </h4>

                        <p class="text-muted mb-1">{{ $request_profile->email }}</p>

                        <span class="badge bg-primary text-white  w-25 h-100 rounded-pill px-2 py-2">Alumni</span>
                        <span
                            class="badge bg-primary text-white   w-25 h-100 rounded-pill px-2 py-2">{{ $request_profile->current_job ?? 'un employed ' }}</span>

                        <div class="mt-3">
                            <a href="{{ url('alumni_std/edit_profile', $request_profile->user_id) }}"
                                class="btn btn-outline-primary w-100 rounded-pill">
                                ✏ Edit Profile
                            </a>
                        </div>

                    </div>
                </div>

            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-8">

                <!-- BASIC INFO -->
                <div class="card info-card mb-4">
                    <div class="card-body">
                        <div class="section-title">Basic Information</div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Phone</strong>
                                    {{ $request_profile->phone_number ?? '-' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Gender</strong>
                                    {{ $request_profile->gender ?? '-' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Date of Birth</strong>
                                    {{ $request_profile->dob ?? '-' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Address</strong>
                                    {{ $request_profile->address ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ACADEMIC -->
                <div class="card info-card mb-4">
                    <div class="card-body">
                        <div class="section-title">Academic Information</div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Department</strong>
                                    {{ $request_profile->department_name ?? '-' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Graduation Year</strong>
                                    {{ $request_profile->graduation_year ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CAREER -->
                <div class="card info-card">
                    <div class="card-body">
                        <div class="section-title">Career Information</div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Current Job</strong>
                                    {{ $request_profile->current_job ?? 'Not Working' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <strong>Company</strong>
                                    {{ $request_profile->company_name ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
