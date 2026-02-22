@extends('alumni_std.layouts.app')
@section('title', 'Alumni Events')

@section('content')
    <style>
        :root {
            --blue-gradient: linear-gradient(135deg, #60a5fa 0%, #2563eb 100%);
            --light-blue-bg: #f8fafc;
            --success-green: #10b981;
            --danger-red: #ef4444;
        }

        body {
            background-color: var(--light-blue-bg);
        }

        /* Modern Section Header */
        .section-title {
            color: #1e3a8a;
            position: relative;
            padding-left: 15px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background: var(--blue-gradient);
            border-radius: 10px;
        }

        /* Ticket Style (Registered) */
        .ticket-container {
            border: none;
            background: #fff;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            border-left: 8px solid var(--success-green);
            transition: transform 0.3s ease;
        }

        .ticket-container.missed {
            border-left: 8px solid var(--danger-red);
        }

        .ticket-container:hover {
            transform: scale(1.02);
        }

        .ticket-container::after {
            content: '';
            position: absolute;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            background: var(--light-blue-bg);
            border-radius: 50%;
        }

        /* Event Card (Upcoming) */
        .event-card-premium {
            border: none;
            border-radius: 25px;
            background: #fff;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .event-card-premium:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.15) !important;
        }

        .event-img-header {
            height: 160px;
            background: var(--blue-gradient);
            border-radius: 22px 22px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
        }

        .date-badge-premium {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
            padding: 8px 15px;
            border-radius: 15px;
            position: absolute;
            bottom: -20px;
            right: 25px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-width: 65px;
        }

        .date-badge-premium .day {
            font-size: 1.3rem;
            font-weight: 800;
            color: #1e40af;
            line-height: 1;
        }

        .date-badge-premium .month {
            font-size: 0.7rem;
            font-weight: 700;
            color: #60a5fa;
            text-transform: uppercase;
        }

        .btn-gradient-blue {
            background: var(--blue-gradient);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 10px 25px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .btn-gradient-blue:hover {
            color: white;
            opacity: 0.9;
            transform: translateY(-2px);
        }
    </style>

    <div class="container py-5">

        @if (session('success'))
            <div class="alert alert-primary border-0 shadow-sm rounded-4 mb-5 p-3">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        {{-- --- MY REGISTERED EVENTS (DYNAMIC COLORS) --- --}}
        <h3 class="section-title fw-bold mb-4">Reserved Seats</h3>
        <div class="row mb-5">
            @forelse($myEvents as $event)
                @php
                    $eventDate = \Carbon\Carbon::parse($event->event_date);
                    $isPast = $eventDate->isPast() && !$eventDate->isToday();
                @endphp
                <div class="col-lg-6 col-md-12 mb-4">
                    <a href="{{ route('alumni_std.events_show', $event->event_id) }}" class="text-decoration-none">
                        <div class="card ticket-container shadow-sm h-100 p-2 {{ $isPast ? 'missed' : '' }}">
                            <div class="card-body d-flex align-items-center">

                                {{-- Date Column --}}
                                <div class="date-box text-center me-4 px-3" style="border-right: 2px dashed #e2e8f0;">
                                    <h2 class="fw-black mb-0 {{ $isPast ? 'text-danger' : 'text-success' }}">
                                        {{ $eventDate->format('d') }}
                                    </h2>
                                    <span class="text-muted small fw-bold">{{ $eventDate->format('M Y') }}</span>
                                </div>

                                {{-- Info Column --}}
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-1">{{ $event->event_name }}</h5>
                                    @if ($isPast)
                                        <p class="small text-danger mb-2">
                                            <i class="fas fa-calendar-times me-1"></i> Event Date Passed
                                        </p>
                                        <span
                                            class="badge bg-danger-subtle text-danger border border-danger border-opacity-25 rounded-pill px-3">
                                            Not Attended / Closed
                                        </span>
                                    @else
                                        <p class="small text-muted mb-2">
                                            <i class="fas fa-ticket-alt me-1 text-primary"></i> Click for entry pass
                                        </p>
                                        <span
                                            class="badge bg-success-subtle text-success border border-success border-opacity-25 rounded-pill px-3">
                                            Active Registered
                                        </span>
                                    @endif
                                </div>

                                {{-- Visual Indicator --}}
                                <div class="ms-3 text-muted opacity-25">
                                    <i class="fas fa-chevron-right fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="py-5 text-center border rounded-5 bg-white shadow-sm"
                        style="border-style: dashed !important;">
                        <img src="https://cdn-icons-png.flaticon.com/512/1053/1053155.png" width="80"
                            class="opacity-25 mb-3">
                        <h6 class="text-muted">No registrations found. Discover events below!</h6>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- --- UPCOMING EVENTS GRID (BLUE THEME) --- --}}
        <h3 class="section-title fw-bold mb-4">Explore Upcoming Events</h3>
        <div class="row g-4">
            @forelse($upcomingEvents as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="card event-card-premium shadow-sm h-100">
                        <div class="event-img-header">
                            <i class="fas fa-calendar-star fa-3x opacity-25"></i>
                            <div class="date-badge-premium">
                                @php $uDate = \Carbon\Carbon::parse($event->event_date); @endphp
                                <div class="day">{{ $uDate->format('d') }}</div>
                                <div class="month">{{ $uDate->format('M') }}</div>
                            </div>
                        </div>

                        <div class="card-body p-4 pt-5">
                            <h5 class="fw-bold text-dark mb-2 mt-1">{{ $event->event_name }}</h5>
                            <p class="text-muted small mb-4" style="line-height: 1.6;">
                                {{ Str::limit($event->description, 100) }}
                            </p>

                            <div class="d-flex align-items-center mb-4">
                                <div class="me-auto">
                                    <small class="text-muted d-block fw-bold text-uppercase"
                                        style="font-size: 0.6rem;">Venue</small>
                                    <span class="small fw-semibold text-primary">
                                        <i class="fas fa-map-marker-alt me-1"></i> {{ $event->location ?? 'Campus Hall' }}
                                    </span>
                                </div>
                            </div>

                            <a href="{{ route('alumni_std.events_show', $event->event_id) }}"
                                class="btn btn-gradient-blue w-100 shadow-sm">
                                View Event Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Stay tuned! New events coming soon.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
