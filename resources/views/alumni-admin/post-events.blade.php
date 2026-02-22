@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7fe;
        }

        /* Header Styling */
        .app-content-header {
            padding: 50px 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            margin-bottom: -40px;
            color: white;
        }

        /* Professional Card Styling */
        .custom-card {
            border: none;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }

        .card-title-gold {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Form Design */
        .form-label {
            font-weight: 600;
            color: #64748b;
            font-size: 0.85rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.2s;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        /* Button Styling */
        .btn-publish {
            background: #10b981;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
            transition: all 0.2s;
        }

        .btn-publish:hover {
            transform: translateY(-2px);
            background: #059669;
            color: white;
        }

        /* DataTable Customization */
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 8px 12px;
        }

        .table thead th {
            background-color: #f8fafc !important;
            color: #64748b;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            border-bottom: 1px solid #e2e8f0;
        }

        .badge-date {
            background: #eff6ff;
            color: #3b82f6;
            padding: 5px 10px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        /* Modern Edit Button Styling */
        .btn-edit-custom {
            background: #ffffff;
            color: #475569;
            border: 1px solid #e2e8f0;
            padding: 8px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        /* Hover Effect */
        .btn-edit-custom:hover {
            background: #3b82f6;
            /* Blue background on hover */
            color: #ffffff !important;
            /* White text */
            border-color: #3b82f6;
            transform: translateY(-3px) scale(1.05);
            /* Upar uthega aur thora bara hoga */
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
            /* Blue glow effect */
        }

        /* Icon rotation on hover */
        .btn-edit-custom:hover i {
            color: #ffffff !important;
            transform: rotate(-10deg);
            transition: transform 0.2s ease;
        }

        /* Subtle click effect */
        .btn-edit-custom:active {
            transform: translateY(-1px) scale(0.98);
        }
    </style>

    <div class="app-content-header">
        <div class="container-fluid px-4 text-center text-sm-start">
            <h3 class="fw-700">Publish Events</h3>
            <p class="text-white-50 mb-0 small">Create and organize memorable alumni gatherings.</p>
        </div>
    </div>

    <div class="app-content mt-4">
        <div class="container-fluid px-4">

            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            <div class="card custom-card">
                <h5 class="card-title-gold"><i class="bi bi-calendar-plus text-primary"></i> Create New Event</h5>
                <form method="POST" action="{{ url('alumni-admin/save-event') }}">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Event Name</label>
                            <input name="event_name" class="form-control" placeholder="Annual Grand Reunion 2026"
                                value="{{ old('event_name') }}">
                            @error('event_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Event Date</label>
                            <input name="event_date" type="date" class="form-control" value="{{ old('event_date') }}">
                            @error('event_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Organizer</label>
                            <input name="organizer" class="form-control" placeholder="Alumni Board"
                                value="{{ old('organizer') }}">
                            @error('organizer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Location</label>
                            <input name="event_location" class="form-control"
                                placeholder="Main University Auditorium / Online Zoom Link"
                                value="{{ old('event_location') }}">
                            @error('event_location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Detailed Description</label>
                            <textarea name="description" class="form-control" rows="3"
                                placeholder="Explain the agenda and highlights of the event...">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <button class="btn btn-publish">
                            <i class="bi bi-send-fill me-2"></i> Publish Event Now
                        </button>
                    </div>
                </form>
            </div>

            <div class="card custom-card">
                <h5 class="card-title-gold"><i class="bi bi-list-stars text-primary"></i> Upcoming Events History</h5>
                <div class="table-responsive">
                    <table id="eventsTable" class="table table-hover align-middle w-100">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Organizer</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th class="text-center no-sort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $event->event_name }}</div>
                                        <div class="text-muted small"><i class="bi bi-geo-alt"></i>
                                            {{ $event->event_location ?? 'Not specified' }}</div>
                                    </td>
                                    <td><span
                                            class="text-secondary small fw-medium">{{ $event->organizer ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <div class="text-muted small text-truncate" style="max-width: 200px;">
                                            {{ $event->description ?? 'No description' }}
                                        </div>
                                    </td>
                                    <td><span class="badge-date">{{ $event->event_date }}</span></td>
                                    <td class="text-center">
                                        <a href="{{ url('alumni-admin/edit-events', $event->event_id) }}"
                                            class="btn-edit-custom">
                                            <i class="bi bi-pencil-square me-2 text-primary"></i>
                                            <span>Edit</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#eventsTable').DataTable({
                "pageLength": 10,
                "order": [
                    [3, "desc"]
                ], // Sort by date descending
                "responsive": true,
                "columnDefs": [{
                    "targets": "no-sort",
                    "orderable": false
                }],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search events...",
                    "lengthMenu": "Show _MENU_"
                }
            });

            // Add class to search input for styling
            $('.dataTables_filter input').addClass('form-control shadow-sm');
        });
    </script>
@endsection
