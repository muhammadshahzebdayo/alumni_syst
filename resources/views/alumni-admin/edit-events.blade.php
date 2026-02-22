@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7fe;
        }

        /* Professional Header Styling */
        .app-content-header {
            padding: 60px 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            margin-bottom: -60px;
            color: white;
        }

        .header-title {
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        /* Clean Card Design */
        .form-container-card {
            border: none;
            border-radius: 24px;
            background: #ffffff;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            padding: 40px;
            position: relative;
            z-index: 10;
        }

        /* Form Elements Styling */
        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        textarea.form-control {
            resize: none;
        }

        /* Button Styling */
        .btn-update {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .btn-update:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4);
            color: white;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #64748b;
            padding: 14px 30px;
            border-radius: 12px;
            font-weight: 600;
            margin-right: 10px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        .input-icon-wrapper {
            position: relative;
        }

        .section-divider {
            height: 1px;
            background: #f1f5f9;
            margin: 30px 0;
        }
    </style>

    <div class="app-content-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h3 class="header-title mb-1">Edit Event Details</h3>
                    <p class="text-white-50 small mb-0">Update information for: <strong>{{ $event->event_name }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="form-container-card">
                    <form action="{{ url('/alumni-admin/update-event/' . $event->event_id) }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-type text-primary me-1"></i> Event Name
                                </label>
                                <input type="text" class="form-control" name="event_name"
                                    value="{{ $event->event_name }}" placeholder="e.g. Annual Alumni Meetup" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-person-badge text-primary me-1"></i> Event Organizer
                                </label>
                                <input type="text" class="form-control" name="event_organizer"
                                    value="{{ $event->organizer }}" placeholder="e.g. Alumni Association" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">
                                    <i class="bi bi-justify-left text-primary me-1"></i> Event Description
                                </label>
                                <textarea name="event_description" cols="10" rows="6" class="form-control"
                                    placeholder="Describe what this event is about...">{{ $event->description }}</textarea>
                            </div>

                            <div class="section-divider"></div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    <i class="bi bi-calendar-event text-primary me-1"></i> Event Date
                                </label>
                                <input type="date" class="form-control" name="event_date"
                                    value="{{ $event->event_date }}" required>
                            </div>

                            <div class="col-12 mt-5 d-flex align-items-center justify-content-end">
                                <a href="{{ url()->previous() }}" class="btn btn-cancel">
                                    Cancel
                                </a>
                                <button type="submit" name="update" class="btn btn-update">
                                    <i class="bi bi-check-circle me-2"></i> Update Event Details
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple logic to ensure the date input looks good on all browsers
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Edit Form Ready");
        });
    </script>
@endsection
