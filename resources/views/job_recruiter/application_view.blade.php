@extends('job_recruiter.layouts.app')
@section('title', 'Review Applicants')

@section('content')
    <div class="container-fluid pt-4 px-4 pb-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <h3 class="fw-black text-dark mb-1">Applicant <span class="text-primary">Pipeline</span></h3>
                <p class="text-muted small">Review and manage alumni applications for your active roles.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-flex justify-content-md-end gap-2 mt-3 mt-md-0">
                    <div class="input-group shadow-sm rounded-pill bg-white px-3 py-1" style="width: 250px;">
                        <span class="input-group-text bg-transparent border-0 text-muted"><i
                                class="fa fa-search"></i></span>
                        <input type="text" class="form-control border-0 bg-transparent small"
                            placeholder="Search talent...">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse ($applicants as $applicant)
                @php
                    $fullName = $applicant->first_name . ' ' . $applicant->last_name;
                    // Status class set karna design ke mutabiq
                    $statusClass = strtolower($applicant->status ?? 'pending');
                @endphp
                <div class="col-xl-4 col-md-6">
                    <div class="applicant-card bg-white rounded-4 shadow-sm border-0 overflow-hidden position-relative">
                        <div class="status-ribbon {{ $statusClass }}">
                            {{ ucfirst($applicant->status ?? 'Pending') }}
                        </div>

                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="avatar-wrapper me-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($fullName) }}&background=random&color=fff"
                                        class="rounded-circle shadow-sm" width="60">
                                    <span class="online-indicator"></span>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-dark">{{ $fullName }}</h5>
                                    <span
                                        class="text-primary fw-bold x-small uppercase tracking-wider">{{ $applicant->job_role }}</span>
                                </div>
                            </div>

                            <div class="row g-2 mb-4">
                                <div class="col-6">
                                    <div class="info-pill">
                                        <i class="fa fa-graduation-cap text-muted me-2"></i>
                                        <span class="small fw-bold">Class of
                                            {{ $applicant->graduation_year ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="info-pill">
                                        <i class="fa fa-clock text-muted me-2"></i>
                                        <span
                                            class="small fw-bold">{{ \Carbon\Carbon::parse($applicant->applied_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('job_recruiter.job_applicant_profile', $applicant->user_id) }}"
                                    class="btn btn-primary flex-grow-1 rounded-pill fw-bold small py-2 shadow-sm">
                                    <i class="fa fa-user me-2"></i>View profile
                                </a>
                                <div class="dropdown">
                                    <button class="btn btn-light rounded-pill px-3 py-2 shadow-sm"
                                        data-bs-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-2">
                                        <li><a class="dropdown-item rounded-3 py-2" href="#"><i
                                                    class="fa fa-check-circle text-success me-2"></i> Shortlist</a></li>
                                        <li><a class="dropdown-item rounded-3 py-2" href="#"><i
                                                    class="fa fa-times-circle text-danger me-2"></i> Reject</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item rounded-3 py-2" href="#"><i
                                                    class="fa fa-envelope text-info me-2"></i> Message</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No applicants found for your job postings.</p>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        .applicant-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .applicant-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .avatar-wrapper {
            position: relative;
        }

        .online-indicator {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 14px;
            height: 14px;
            background: #10b981;
            border: 3px solid #fff;
            border-radius: 50%;
        }

        .info-pill {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            padding: 8px 12px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .status-ribbon {
            position: absolute;
            top: 12px;
            right: -30px;
            transform: rotate(45deg);
            width: 120px;
            text-align: center;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            color: white;
            letter-spacing: 1px;
            padding: 3px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .status-ribbon.pending {
            background: #64748b;
        }

        .status-ribbon.shortlisted {
            background: #2563eb;
        }

        .status-ribbon.rejected {
            background: #ef4444;
        }

        .tracking-wider {
            letter-spacing: 1px;
        }

        .fw-black {
            font-weight: 800;
        }

        .x-small {
            font-size: 10px;
        }

        .btn-white {
            background: #fff;
            border: 1px solid #f1f5f9;
        }
    </style>
@endsection
