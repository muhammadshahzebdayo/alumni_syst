@extends('job_recruiter.layouts.app')
@section('title', 'Applicant Profile')

@section('content')
    <div class="container-fluid pt-4 px-4 pb-5">
        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-light rounded-pill shadow-sm px-4">
                <i class="fa fa-arrow-left me-2"></i> Back to Pipeline
            </a>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4 mb-4">
                    <div class="position-relative d-inline-block mx-auto mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($applicant->first_name . ' ' . $applicant->last_name) }}&background=0d6efd&color=fff&size=128"
                            class="rounded-circle shadow-sm  border-4 border-white" width="120">
                        <span
                            class="position-absolute bottom-0 end-0 bg-success border border-2 border-white rounded-circle p-2"></span>
                    </div>
                    <h4 class="fw-bold mb-1">{{ $applicant->first_name }} {{ $applicant->last_name }}</h4>
                    <p class="text-primary fw-bold small mb-3">{{ $applicant->designation ?? 'Alumni' }}</p>

                    <hr class="my-4 opacity-25">

                    <div class="text-start">
                        <div class="mb-3 d-flex align-items-center">
                            <div class="icon-box me-3"><i class="fa fa-envelope text-primary"></i></div>
                            <div>
                                <p class="text-muted mb-0 x-small">Email Address</p>
                                <span class="fw-bold small">{{ $applicant->email }}</span>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <div class="icon-box me-3"><i class="fa fa-phone text-primary"></i></div>
                            <div>
                                <p class="text-muted mb-0 x-small">Phone Number</p>
                                <span class="fw-bold small">{{ $applicant->phone_number ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="mb-0 d-flex align-items-center">
                            <div class="icon-box me-3"><i class="fa fa-map-marker-alt text-primary"></i></div>
                            <div>
                                <p class="text-muted mb-0 x-small">Location</p>
                                <span class="fw-bold small">{{ $applicant->address ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold mb-4 d-flex align-items-center">
                        <i class="fa fa-user-graduate text-primary me-2"></i> Education Details
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded-3">
                                <p class="text-muted small mb-1">Department</p>
                                <h6 class="fw-bold mb-0">{{ $applicant->department_name ?? 'Not Specified' }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded-3">
                                <p class="text-muted small mb-1">Graduation Year</p>
                                <h6 class="fw-bold mb-0">Class of {{ $applicant->graduation_year ?? 'N/A' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="fw-bold mb-4 d-flex align-items-center">
                        <i class="fa fa-briefcase text-primary me-2"></i> Current Employment
                    </h5>
                    <div class="d-flex align-items-start border-start border-2 border-primary ps-4 ms-2 py-2">
                        <div>
                            <h6 class="fw-bold mb-1">{{ $applicant->designation ?? 'Job Title' }}</h6>
                            <p class="text-primary mb-1 fw-bold">{{ $applicant->company_name ?? 'Currently Unemployed' }}
                            </p>
                            <p class="text-muted small mb-0">{{ $applicant->current_job ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <button class="btn btn-success flex-grow-1 rounded-pill py-3 fw-bold shadow-sm">
                        <i class="fa fa-check-circle me-2"></i> Shortlist Candidate
                    </button>
                    <button class="btn btn-outline-danger rounded-pill px-4 py-3 fw-bold shadow-sm">
                        <i class="fa fa-times-circle"></i> Reject
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .icon-box {
            width: 35px;
            height: 35px;
            background: #f0f7ff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .x-small {
            font-size: 11px;
        }

        .fw-black {
            font-weight: 800;
        }

        .card {
            transition: 0.3s;
        }
    </style>
@endsection
