@extends('alumni_std.layouts.app')
@section('title', 'Event Details')

@section('content')
    <style>
        :root {
            --blue-gradient: linear-gradient(135deg, #60a5fa 0%, #2563eb 100%);
        }

        body {
            background-color: #f8fafc;
        }

        /* Header Banner */
        .event-detail-banner {
            background: var(--blue-gradient);
            border-radius: 25px;
            padding: 40px;
            color: white;
            margin-bottom: -50px;
            /* Overlap effect */
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }

        /* Main Content Card */
        .content-card {
            border: none;
            border-radius: 25px;
            padding-top: 60px;
            /* Space for overlap */
            background: #ffffff;
        }

        /* Sidebar Info Boxes */
        .info-box {
            background: #f0f7ff;
            border-radius: 20px;
            padding: 20px;
            border: 1px solid rgba(37, 99, 235, 0.1);
            margin-bottom: 20px;
        }

        .icon-circle {
            width: 45px;
            height: 45px;
            background: white;
            color: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 15px;
        }

        .btn-join {
            background: var(--blue-gradient);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: 0.3s;
        }

        .btn-join:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
            color: white;
        }

        .registration-status {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #10b981;
            border-radius: 15px;
            padding: 15px;
            font-weight: 600;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-lg-10">
                <div class="event-detail-banner">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill fw-bold">EVENT
                                DETAILS</span>
                            <h1 class="fw-bold mb-0 text-white">{{ $event->event_name }}</h1>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <div class="h4 mb-0 fw-light opacity-75">
                                <i
                                    class="far fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($event->event_date)->format('D, M d, Y') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    {{-- Left Side: About Event --}}
                    <div class="col-lg-8">
                        <div class="card content-card shadow-sm h-100">
                            <div class="card-body p-4 p-md-5">
                                <h4 class="fw-bold text-dark mb-4">About the Event</h4>
                                <p class="text-muted" style="line-height: 1.8; font-size: 1.05rem;">
                                    {{ $event->description }}
                                </p>

                                <hr class="my-5 opacity-50">

                                <h5 class="fw-bold mb-3">Event Highlights</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2 text-muted"><i class="fas fa-check-circle text-primary me-2"></i>
                                        Network with industry professionals</li>
                                    <li class="mb-2 text-muted"><i class="fas fa-check-circle text-primary me-2"></i>
                                        Interactive Q&A sessions</li>
                                    <li class="mb-2 text-muted"><i class="fas fa-check-circle text-primary me-2"></i> Career
                                        growth opportunities</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Right Side: Action Sidebar --}}
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                            <div class="card-body p-4">
                                @if ($alreadyRegistered)
                                    <div class="registration-status text-center">
                                        <i class="fas fa-check-double fa-2x mb-2"></i>
                                        <p class="mb-0">You're on the Guest List!</p>
                                        <small class="opacity-75">See you at the event.</small>
                                    </div>
                                @else
                                    <div class="text-center mb-4">
                                        <h6 class="text-muted small fw-bold text-uppercase">Registration Open</h6>
                                        <p class="small">Reserve your spot now before seats fill up.</p>
                                    </div>
                                    <form method="POST" action="{{ route('alumni_std.events.join', $event->event_id) }}">
                                        @csrf
                                        <button class="btn btn-join w-100 shadow-sm">
                                            JOIN EVENT NOW <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <div class="info-box shadow-sm">
                            <div class="icon-circle">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Venue Location</h6>
                            <p class="text-muted small mb-0">{{ $event->location ?? 'University Main Auditorium' }}</p>
                        </div>

                        <div class="info-box shadow-sm">
                            <div class="icon-circle">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">Event Timing</h6>
                            <p class="text-muted small mb-0">10:00 AM - 04:00 PM (Local Time)</p>
                        </div>

                        <div class="text-center p-3">
                            <p class="small text-muted mb-0">Need help? <a href="#"
                                    class="text-primary fw-bold text-decoration-none">Contact Support</a></p>
                        </div>
                    </div>
                </div> {{-- End Inner Row --}}

            </div> {{-- End col-lg-10 --}}
        </div>
    </div>
@endsection
