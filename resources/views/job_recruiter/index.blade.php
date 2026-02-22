@extends('job_recruiter.layouts.app')
@section('title', 'Recruiter Dashboard')

@section('content')
    <div class="container-fluid pt-4 px-4 pb-5 studio-bg">
        <div class="row mb-5">
            <div class="col-12">
                <div class="premium-hero-card p-5 rounded-5 shadow-lg position-relative overflow-hidden">
                    <div class="hero-circle-1"></div>
                    <div class="hero-circle-2"></div>
                    <div class="position-relative z-1 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="badge bg-white text-primary mb-2 px-3 py-2 rounded-pill fw-bold">DASHBOARD
                                OVERVIEW</span>
                            <h1 class="fw-black text-white display-5 mb-2">Welcome Back,
                                {{ Auth::user()->first_name . ' - ' . Auth::user()->last_name }}! </h1>
                            <p class="text-white opacity-75 fs-5 mb-0">You have <span
                                    class="fw-bold text-warning">{{ $total_applicants }}</span> total applicants.</p>
                        </div>
                        <div class="d-none d-lg-block">
                            <a href="{{ route('job_recruiter.create') }}" class="btn-action-glass">
                                <i class="fa fa-plus-circle me-2"></i> Post New Vacancy
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5 mt-n5-custom">
            @php
                $stats_data = [
                    [
                        'label' => 'Total Postings',
                        'value' => $total_postings,
                        'icon' => 'fa-briefcase',
                        'color' => 'blue',
                        'trend' => '+4%',
                    ],
                    [
                        'label' => 'Total Applicants',
                        'value' => $total_applicants,
                        'icon' => 'fa-users',
                        'color' => 'purple',
                        'trend' => '+18%',
                    ],
                    [
                        'label' => 'Active Sessions',
                        'value' => '12',
                        'icon' => 'fa-bolt',
                        'color' => 'orange',
                        'trend' => 'Live',
                    ],
                    [
                        'label' => 'Shortlisted',
                        'value' => '45',
                        'icon' => 'fa-user-check',
                        'color' => 'green',
                        'trend' => '+5%',
                    ],
                ];
            @endphp

            @foreach ($stats_data as $stat)
                <div class="col-sm-6 col-xl-3">
                    <div class="stat-glass-card p-4 h-100">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="stat-icon-box-{{ $stat['color'] }}">
                                <i class="fa {{ $stat['icon'] }}"></i>
                            </div>
                            <span class="trend-badge-{{ $stat['color'] }}">{{ $stat['trend'] }}</span>
                        </div>
                        <h6 class="text-muted small fw-bold text-uppercase tracking-wider">{{ $stat['label'] }}</h6>
                        <h2 class="fw-black m-0 text-dark">{{ $stat['value'] }}</h2>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="glass-section-card p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-black m-0">Active Recruitment <span class="text-gradient-blue">Streams</span></h4>
                        <a href="#" class="btn btn-sm btn-light rounded-pill px-3">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle custom-studio-table">
                            <thead>
                                <tr>
                                    <th>JOB ROLE</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-end">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($active_jobs as $job)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="role-icon">{{ substr($job->title, 0, 1) }}</div>
                                                <div class="ms-3">
                                                    <h6 class="fw-bold mb-0 text-dark">{{ $job->title }}</h6>
                                                    <span class="text-muted x-small"><i
                                                            class="fa fa-clock me-1"></i>{{ $job->created_at }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="status-pill-{{ $job->status == 'Active' ? 'success' : 'warning' }}">
                                                {{ ucfirst($job->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <button class="btn-circle-edit"><i class="fa fa-pencil"></i></button>
                                            <button class="btn-circle-view"><i class="fa fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-section-card p-4 h-100">
                    <h4 class="fw-black mb-4">Applicant <span class="text-gradient-purple">Pulse</span></h4>
                    <div class="pulse-container">
                        @foreach ($recent_applicants as $applicant)
                            <div class="pulse-card d-flex align-items-center p-3 mb-3">
                                <div class="pulse-avatar-wrapper me-3">
                                    <img src="{{ $applicant->profile_photo ?? 'https://i.pravatar.cc/100?u=' . $loop->index }}"
                                        class="rounded-circle border border-2 border-white shadow-sm" width="50">
                                    <div class="status-indicator"></div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold text-dark">
                                        {{ $applicant->first_name . ' - ' . $applicant->last_name }}</h6>
                                    <p class="text-primary mb-0 x-small fw-bold">{{ $applicant->job_title }}</p>
                                    <span class="text-muted x-small opacity-75">Applied
                                        {{ \Carbon\Carbon::parse($applicant->created_at)->diffForHumans() }}</span>
                                </div>
                                <button class="btn-next"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-purple: #7c3aed;
            --studio-bg: #f8fafc;
        }

        .fw-black {
            font-weight: 900;
        }

        .text-gradient-blue {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-purple {
            background: linear-gradient(to right, #7c3aed, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hero Card Enhanced */
        .premium-hero-card {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            border: none;
        }

        .hero-circle-1 {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .hero-circle-2 {
            position: absolute;
            bottom: -30px;
            left: 10%;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .btn-action-glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            padding: 12px 28px;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            font-weight: 800;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: 0.4s;
        }

        .btn-action-glass:hover {
            background: white;
            color: var(--primary-blue);
            transform: translateY(-3px);
        }

        /* Stat Cards */
        .mt-n5-custom {
            margin-top: -3.5rem;
        }

        .stat-glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            transition: 0.4s;
        }

        .stat-glass-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .stat-icon-box-blue {
            width: 48px;
            height: 48px;
            background: #dbeafe;
            color: #2563eb;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-icon-box-purple {
            width: 48px;
            height: 48px;
            background: #f3e8ff;
            color: #7c3aed;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-icon-box-green {
            width: 48px;
            height: 48px;
            background: #dcfce7;
            color: #166534;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-icon-box-orange {
            width: 48px;
            height: 48px;
            background: #ffedd5;
            color: #9a3412;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Tables & Pulse */
        .glass-section-card {
            background: white;
            border-radius: 28px;
            border: 1px solid #f1f5f9;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
        }

        .custom-studio-table thead th {
            background: #f8fafc;
            border: none;
            padding: 15px;
            color: #64748b;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .role-icon {
            width: 40px;
            height: 40px;
            background: #0f172a;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .pulse-card {
            background: #f8fafc;
            border-radius: 20px;
            border: 1px solid transparent;
            transition: 0.3s;
            cursor: pointer;
        }

        .pulse-card:hover {
            background: white;
            border-color: var(--primary-purple);
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .status-indicator {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 12px;
            height: 12px;
            background: #22c55e;
            border: 2px solid white;
            border-radius: 50%;
        }

        .pulse-avatar-wrapper {
            position: relative;
        }
    </style>
@endsection
