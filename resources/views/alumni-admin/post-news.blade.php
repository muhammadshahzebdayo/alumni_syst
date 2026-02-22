@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7fe;
            /* Light Professional Grey-Blue */
        }

        /* Industry Standard Header Gradient */
        .app-content-header {
            padding: 40px 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            margin-bottom: -50px;
            /* Overlap effect */
            color: white;
        }

        .app-content-header h3 {
            font-weight: 700;
            letter-spacing: -0.5px;
            font-size: 1.75rem;
        }

        /* Glassmorphism & Modern Cards */
        .main-container {
            position: relative;
            z-index: 10;
            padding-bottom: 50px;
        }

        .custom-card {
            border: none;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header-styled {
            background: white;
            padding: 25px 30px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Professional Table Styling */
        .table thead th {
            background-color: #f8fafc;
            color: #64748b;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table tbody td {
            padding: 20px;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }

        /* Badges & UI Elements */
        .badge-event {
            background: #e0e7ff;
            color: #4338ca;
            border-radius: 8px;
            padding: 6px 14px;
            font-weight: 600;
            font-size: 0.75rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .date-text {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Buttons Style */
        .btn-create-post {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            transition: transform 0.2s;
        }

        .btn-create-post:hover {
            background: #2563eb;
            transform: translateY(-2px);
            color: white;
        }

        .btn-action-edit {
            background: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 10px;
            padding: 8px 16px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .btn-action-edit:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        /* Modal Enhancements */
        .modal-content {
            border: none;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            border-bottom: 1px solid #f1f5f9;
            padding: 30px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
    </style>

    <div class="app-content-header">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">News & Announcements</h3>
                    <p class="text-white-50 small mb-0">Manage and publish latest updates for the alumni community.</p>
                </div>
                <div class="col-sm-6 text-end">
                    <button type="button" class="btn btn-create-post" id="openCreateModal">
                        <i class="bi bi-plus-lg me-2"></i> Create New Announcement
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content main-container">
        <div class="container-fluid px-4">
            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 p-3 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-3 fs-4"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            <div class="card custom-card">
                <div class="card-header-styled">
                    <h5 class="mb-0 fw-bold text-dark">Recent Broadcasts</h5>
                    <div class="text-muted small">Total: {{ count($newsList) }} Posts</div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Announcement Info</th>
                                    <th>Connection</th>
                                    <th>Publication Date</th>
                                    <th class="text-center">Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsList as $news)
                                    <tr>
                                        <td style="max-width: 400px;">
                                            <div class="fw-bold text-dark mb-1">{{ $news->title }}</div>
                                            <div class="text-muted small text-truncate">{{ Str::limit($news->content, 70) }}
                                            </div>
                                        </td>
                                        <td>
                                            @if ($news->event_name)
                                                <span class="badge-event">
                                                    <i class="bi bi-calendar2-check-fill"></i> {{ $news->event_name }}
                                                </span>
                                            @else
                                                <span class="text-muted small fw-medium">
                                                    <i class="bi bi-broadcast me-1"></i> General News
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="date-text">
                                                <i class="bi bi-clock-history me-1"></i>
                                                {{ date('j M, Y', strtotime($news->created_at)) }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-action-edit edit-btn" data-id="{{ $news->news_id }}"
                                                data-title="{{ $news->title }}"
                                                data-date="{{ date('Y-m-d', strtotime($news->created_at)) }}"
                                                data-content="{{ $news->content }}" data-event="{{ $news->event_id }}">
                                                <i class="bi bi-pencil-square me-1"></i> Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createNewsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-700"><i class="bi bi-megaphone me-2 text-primary"></i> Post New Announcement
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ url('alumni-admin/store-news') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label fw-600">Announcement Title</label>
                                <input type="text" name="title" class="form-control"
                                    placeholder="Enter a catchy title..." required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-600">Link to Event</label>
                                <select name="event_id" class="form-select">
                                    <option value="">No Event (General)</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->event_id }}">{{ $event->event_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-600">Full Description</label>
                                <textarea name="content" class="form-control" rows="6" placeholder="Describe the announcement in detail..."
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4">
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4 rounded-3 shadow">Publish Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editNewsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-700 text-dark">Update Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label fw-600">Title</label>
                                <input type="text" name="title" id="edit_title" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-600">Related Event</label>
                                <select name="event_id" id="edit_event_id" class="form-select">
                                    <option value="">No Event</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->event_id }}">{{ $event->event_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-600">Original Post Date</label>
                                <input type="date" name="date" id="edit_date" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-600">Content</label>
                                <textarea name="content" id="edit_content" class="form-control" rows="6" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4">
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-info text-white px-4 rounded-3 shadow">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create Modal
            const createModal = new bootstrap.Modal(document.getElementById('createNewsModal'));
            document.getElementById('openCreateModal').addEventListener('click', () => createModal.show());

            // Edit Modal Logic
            const editBtns = document.querySelectorAll('.edit-btn');
            const editModal = new bootstrap.Modal(document.getElementById('editNewsModal'));
            const editForm = document.getElementById('editForm');

            editBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const dateRaw = this.getAttribute('data-date'); // YYYY-MM-DD format
                    const content = this.getAttribute('data-content');
                    const eventId = this.getAttribute('data-event');

                    // Extract date only (YYYY-MM-DD) for input[type="date"]
                    const dateOnly = dateRaw.split(' ')[0];

                    document.getElementById('edit_title').value = title;
                    document.getElementById('edit_date').value = dateOnly;
                    document.getElementById('edit_content').value = content;
                    document.getElementById('edit_event_id').value = eventId;

                    editForm.action = `/alumni-admin/update-news/${id}`;
                    editModal.show();
                });
            });
        });
    </script>
@endsection
