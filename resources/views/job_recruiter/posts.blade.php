@extends('job_recruiter.layouts.app')
@section('title', 'Manage Vacancies')

@section('content')
    <div class="container-fluid pt-4 px-4 pb-5">
        <div class="row mb-5">
            <div class="col-12">
                <div class="header-card p-4 rounded-4 shadow-sm d-md-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="fw-black text-dark mb-1">Job <span class="text-gradient-primary">postings</span></h2>
                        <p class="text-muted mb-0">You have <span class="fw-bold text-primary">{{ count($jobs) }}
                                active</span> opportunities posted.</p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <a href="{{ route('job_recruiter.create') }}"
                            class="btn btn-primary rounded-pill px-4 py-2 shadow-lg hover-scale">
                            <i class="fa fa-plus-circle me-2"></i>Post New Vacancy
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse($jobs as $job)
                <div class="col-xl-4 col-md-6">
                    <div class="job-premium-card h-100 shadow-sm border-0 rounded-4 bg-white overflow-hidden">
                        <div class="card-gradient-top {{ $job->status == 'Active' ? 'bg-active' : 'bg-closed' }}"></div>

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="job-logo-icon shadow-sm">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <span
                                    class="status-badge-glass {{ $job->status == 'Active' ? 'text-success' : 'text-danger' }}">
                                    <i class="fa fa-circle small me-1"></i> {{ ucfirst($job->status) }}
                                </span>
                            </div>

                            <h5 class="fw-black text-dark mb-1">{{ $job->title }}</h5>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-muted small fw-bold"><i class="fa fa-layer-group me-1 text-primary"></i>
                                    {{ $job->category_name }}</span>
                                <span class="mx-2 text-silver">|</span>
                                <span class="text-muted small fw-bold"><i class="fa fa-map-marker-alt me-1 text-danger"></i>
                                    {{ $job->job_type }}</span>
                            </div>

                            <div class="stats-glass-box rounded-4 p-3 d-flex justify-content-between mb-4">
                                <div class="text-center border-end pe-3 w-50">
                                    <span class="d-block text-muted x-small fw-bold">APPLICANTS</span>
                                    <span class="h5 fw-black text-primary mb-0">24</span>
                                </div>
                                <div class="text-center ps-3 w-50">
                                    <span class="d-block text-muted x-small fw-bold">DEADLINE</span>
                                    <span
                                        class="small fw-bold text-dark">{{ date('d M', strtotime($job->deadline)) }}</span>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ url('job_recruiter/application_view') }}"
                                    class="btn btn-soft-primary flex-grow-1 rounded-pill fw-bold small">
                                    View Applicants
                                </a>
                                <div class="dropdown">
                                    <button class="btn btn-light rounded-circle shadow-sm" data-bs-toggle="dropdown">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3">
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="fa fa-edit me-2 text-warning"></i> Edit Details</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="fa fa-pause-circle me-2 text-info"></i> Pause Hiring</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="fa fa-trash me-2"></i> Delete Post</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state-card p-5 rounded-4 bg-white shadow-sm border-dashed">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="100"
                            class="mb-4 opacity-50">
                        <h4 class="fw-bold">No active postings yet</h4>
                        <p class="text-muted">Start by creating your first job vacancy to attract top talent.</p>
                        <a href="{{ url('job_recruiter/create') }}" class="btn btn-primary rounded-pill px-5">Get
                            Started</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        /* Premium Styling */
        .text-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
        }

        .job-premium-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid #f1f5f9 !important;
        }

        .job-premium-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08) !important;
            border-color: #cbd5e1 !important;
        }

        .card-gradient-top {
            height: 5px;
            width: 100%;
        }

        .bg-active {
            background: linear-gradient(90deg, #10b981, #34d399);
        }

        .bg-closed {
            background: linear-gradient(90deg, #ef4444, #f87171);
        }

        .job-logo-icon {
            width: 48px;
            height: 48px;
            background: #eff6ff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 1.2rem;
        }

        .status-badge-glass {
            background: rgba(241, 245, 249, 0.8);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .stats-glass-box {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
        }

        .btn-soft-primary {
            background: #eff6ff;
            color: #2563eb;
            transition: 0.3s;
        }

        .btn-soft-primary:hover {
            background: #2563eb;
            color: #ffffff;
        }

        .hover-scale {
            transition: 0.3s;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .border-dashed {
            border: 2px dashed #e2e8f0;
        }

        .fw-black {
            font-weight: 800;
        }

        .x-small {
            font-size: 10px;
        }

        .text-silver {
            color: #cbd5e1;
        }
    </style>
@endsection
