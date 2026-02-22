@extends('job_recruiter.layouts.app')
@section('title', 'Company Profile')

@section('content')
    <div class="container-fluid pt-4 px-4 pb-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="profile-cover"
                        style="height: 180px; background: linear-gradient(135deg, #1e293b 0%, #3b82f6 100%);"></div>

                    <div class="card-body p-4 pt-0">
                        <div class="d-md-flex align-items-end mt-n5 position-relative px-3">
                            <div class="profile-logo-container bg-white p-2 rounded-4 shadow-sm">
                                {{-- Agar profile image column hai to wo use karein, warna default --}}
                                <img id="logo-preview"
                                    src="https://ui-avatars.com/api/?name={{ urlencode($recruiter->first_name) }}&background=random&size=120"
                                    class="rounded-3 img-fluid" style="width: 120px; height: 120px; object-fit: cover;">
                            </div>

                            <div class="ms-md-4 mt-3 mt-md-0 flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h3 class="fw-black text-dark mb-0">
                                            {{-- Company Name agar table mein hai, warna Recruiter Name --}}
                                            {{ $recruiter->company_name ?? $recruiter->first_name . ' ' . $recruiter->last_name }}
                                            <i class="fa fa-check-circle text-primary small"></i>
                                        </h3>
                                        <p class="text-muted">
                                            <i
                                                class="fa fa-map-marker-alt me-2"></i>{{ $recruiter->address ?? 'Location not set' }}
                                        </p>
                                    </div>

                                    <a href="{{ url('/job_recruiter/edit_profile') }}"
                                        class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
                                        <i class="fa fa-edit me-2"></i>Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold text-dark mb-3">About the Company</h5>
                    <p class="text-muted leading-relaxed">
                        {{ $recruiter->about ?? 'No description available. Please update your profile to add company details.' }}
                    </p>
                    <div class="d-flex gap-2 mt-2">
                        <span class="badge bg-soft-primary text-primary px-3 py-2">Hiring Partner</span>
                        <span class="badge bg-soft-primary text-primary px-3 py-2">Verified Recruiter</span>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold text-dark mb-4">Recent Hiring Activity</h5>
                    <div class="timeline-simple">
                        @forelse($recentActivity as $activity)
                            <div
                                class="timeline-item d-flex pb-4 border-start ps-4 position-relative border-primary border-2 ms-2">
                                <span class="timeline-dot bg-primary"></span>
                                <div>
                                    <h6 class="fw-bold mb-1">Vacancy Posted: {{ $activity->title }}</h6>
                                    <p class="text-muted x-small mb-0">
                                        {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted small">No recent jobs posted.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                    <h5 class="fw-bold text-dark mb-4">Quick Insights</h5>
                    <div class="d-grid gap-3">
                        <div class="d-flex align-items-center p-3 rounded-4 bg-light border border-white">
                            <div class="icon-box bg-white text-primary shadow-sm me-3">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div>
                                <span class="d-block text-muted x-small fw-bold">ACTIVE JOBS</span>
                                <span class="h6 fw-black mb-0">{{ $totalJobs }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3 rounded-4 bg-light border border-white">
                            <div class="icon-box bg-white text-success shadow-sm me-3">
                                <i class="fa fa-users"></i>
                            </div>
                            <div>
                                <span class="d-block text-muted x-small fw-bold">TOTAL APPLICANTS</span>
                                <span class="h6 fw-black mb-0">{{ $totalApplicants }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h5 class="fw-bold text-dark mb-3">Contact Information</h5>
                    <div class="list-group list-group-flush border-0">
                        <div class="list-group-item border-0 px-0 d-flex align-items-center justify-content-between">
                            <span class="text-muted small"><i class="fa fa-envelope text-primary me-2"></i>
                                {{ $recruiter->email }}</span>
                        </div>
                        <div class="list-group-item border-0 px-0 d-flex align-items-center justify-content-between">
                            <span class="text-muted small"><i class="fa fa-phone text-success me-2"></i>
                                {{ $recruiter->phone_number ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .mt-n5 {
            margin-top: -3rem !important;
        }

        .profile-logo-container {
            display: inline-block;
            border-radius: 20px;
            z-index: 5;
        }

        .leading-relaxed {
            line-height: 1.8;
        }

        .icon-box {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .timeline-dot {
            position: absolute;
            left: -7px;
            top: 0;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 3px solid #fff;
        }

        .bg-soft-primary {
            background: #eff6ff;
        }

        .fw-black {
            font-weight: 800;
        }

        .x-small {
            font-size: 11px;
        }

        .tracking-wider {
            letter-spacing: 1px;
        }

        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
        }
    </style>
@endsection
