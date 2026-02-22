@extends('alumni_std.layouts.app')
@section('title', 'Alumni Dashboard')

@section('content')
    <div class="dashboard-container py-4">
        <div class="container px-lg-5">

            <div class="welcome-banner p-4 mb-5 shadow-sm d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold text-white mb-1 text-capitalize">Welcome back,
                        {{ Auth::user()->first_name ?? ' not' }} {{ Auth::user()->last_name ?? ' mentioned' }}! </h2>
                    <p class="text-white-50 mb-0">Explore new opportunities and stay connected with your network.</p>
                </div>
                <div class="d-none d-md-block">
                    <i class="fas fa-user-graduate text-white-50" style="font-size: 4rem;"></i>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="stat-glass-card">
                        <div class="stat-icon bg-primary"><i class="fas fa-briefcase"></i></div>
                        <div class="stat-content">
                            <h3>{{ $totalJobs }}</h3>
                            <span>Total Jobs</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-glass-card">
                        <div class="stat-icon bg-success"><i class="fas fa-paper-plane"></i></div>
                        <div class="stat-content">
                            <h3>{{ $appliedJobs }}</h3>
                            <span>My Applications</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-glass-card">
                        <div class="stat-icon bg-warning text-dark"><i class="fas fa-fire"></i></div>
                        <div class="stat-content">
                            <h3>{{ $newJobsWeekly }}</h3>
                            <span>New This Week</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-glass-card">
                        <div class="stat-icon bg-info"><i class="fas fa-calendar-day"></i></div>
                        <div class="stat-content">
                            <h3>{{ $todayEventsCount }}</h3>
                            <span>Today's Events</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0">Latest Opportunities</h4>
                        <a href="{{ route('alumni_std.jobs') }}" class="btn btn-sm btn-outline-primary rounded-pill">View
                            All Jobs</a>
                    </div>

                    <div class="job-stack">
                        @forelse($latestJobs as $job)
                            <div class="job-card-item mb-3 p-3 transition-all">
                                <div class="d-flex align-items-center">
                                    <div class="company-logo-box me-3">
                                        {{ substr($job->company_name, 0, 1) }}
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">{{ $job->title }}</h6>
                                        <p class="text-muted small mb-0">
                                            <span class="me-2"><i class="far fa-building me-1"></i>
                                                {{ $job->company_name }}</span>
                                            <span class="me-2"><i class="fas fa-map-marker-alt me-1"></i>
                                                {{ $job->location }}</span>
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        <span
                                            class="badge {{ $job->job_type == 'Internship' ? 'bg-soft-success' : 'bg-soft-primary' }} mb-2 d-block">
                                            {{ $job->job_type }}
                                        </span>
                                        <a href="{{ route('alumni_std.view_jobs', $job->job_id) }}"
                                            class="btn btn-sm btn-light">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="100"
                                    class="mb-3 opacity-50">
                                <p class="text-muted">No new jobs posted yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar-sticky">
                        <h4 class="fw-bold mb-4">My Schedule</h4>
                        <div class="events-card p-4 rounded-4 bg-white shadow-sm">
                            @forelse($myUpcomingEvents as $event)
                                <div class="event-mini-item d-flex mb-3 pb-3 border-bottom">
                                    <div class="event-date-box me-3">
                                        <span class="d-block fw-bold">{{ date('d', strtotime($event->event_date)) }}</span>
                                        <small>{{ date('M', strtotime($event->event_date)) }}</small>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold small text-dark">{{ $event->event_title }}</h6>
                                        <small class="text-muted">{{ $event->event_time }}</small>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-3">
                                    <p class="small text-muted mb-0">No upcoming registered events.</p>
                                </div>
                            @endforelse
                            <button class="btn btn-primary w-100 mt-3 rounded-pill"><a
                                    class=" text-white text-decoration-none"
                                    href="{{ route('alumni_std.events') }}">Explore More Events</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-accent: #4361ee;
            --secondary-accent: #3f37c9;
            --soft-bg: #f8f9fe;
        }

        .dashboard-container {
            background: var(--soft-bg);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-accent), var(--secondary-accent));
            border-radius: 24px;
        }

        /* Stats Cards */
        .stat-glass-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
        }

        .stat-content h3 {
            font-size: 1.5rem;
            font-weight: 800;
            margin: 0;
            color: #1e293b;
        }

        .stat-content span {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        /* Job Cards */
        .job-card-item {
            background: #fff;
            border-radius: 18px;
            border: 1px solid #edf2f7;
        }

        .job-card-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            border-color: var(--primary-accent);
        }

        .company-logo-box {
            width: 55px;
            height: 55px;
            background: #f1f5f9;
            color: var(--primary-accent);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.4rem;
        }

        /* Badges */
        .bg-soft-success {
            background: #dcfce7;
            color: #166534;
        }

        .bg-soft-primary {
            background: #dbeafe;
            color: #1e40af;
        }

        /* Event Date Box */
        .event-date-box {
            background: var(--soft-bg);
            color: var(--primary-accent);
            padding: 8px 12px;
            border-radius: 12px;
            text-align: center;
            min-width: 55px;
        }

        .sidebar-sticky {
            position: sticky;
            top: 100px;
        }
    </style>
@endsection
