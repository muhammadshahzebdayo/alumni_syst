@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --accent-color: #4f46e5;
            --bg-light: #f8fafc;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Breadcrumbs Styling */
        .breadcrumbs {
            background: #fff;
            padding: 15px 25px;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 25px;
        }

        .breadcrumb-item a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
        }

        /* Card & Table Design */
        .alumni-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            background: #fff;
        }

        .card-header-main {
            background: #1e293b;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table thead th {
            background: #f1f5f9;
            color: #475569;
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 700;
            border: none;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f8fafc;
        }

        /* Custom Badges */
        .badge-year {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #dbeafe;
            font-weight: 600;
            padding: 6px 12px;
        }

        .badge-company {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #dcfce7;
            font-weight: 500;
        }

        /* DataTable Custom Overrides */
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 8px 15px;
            width: 250px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--accent-color) !important;
            color: white !important;
            border: none;
            border-radius: 8px;
        }
    </style>

    <div class="breadcrumbs shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="mb-0 fw-bold text-dark">Industry Deployment</h4>
                    <small class="text-muted">Tracking alumni career success & placements</small>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-md-end mb-0 mt-2 mt-md-0">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Alumni</li>
                            <li class="breadcrumb-item active" aria-current="page">Industry Placements</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card alumni-card">
                <div class="card-header-main">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i> Alumni Employment Details</h5>
                    <span class="badge bg-primary rounded-pill px-3 py-2">Total: {{ count($alumniList) }}</span>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover" id="alumniEmploymentTable">
                            <thead>
                                <tr>
                                    <th>Alumni Identity</th>
                                    <th>Graduation</th>
                                    <th>Job & Designation</th>
                                    <th>Company</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumniList as $alumnus)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3 bg-primary text-white d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 40px; height: 40px; font-size: 14px;">
                                                    {{ substr($alumnus->first_name, 0, 1) }}{{ substr($alumnus->last_name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $alumnus->first_name }}
                                                        {{ $alumnus->last_name }}</div>
                                                    <small class="text-muted">{{ $alumnus->department_name }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-year">{{ $alumnus->graduation_year }}</span>
                                        </td>
                                        <td>
                                            <div class="text-primary fw-600 mb-0" style="font-size: 0.95rem;">
                                                {{ $alumnus->current_job ?? 'Not Specified' }}
                                            </div>
                                            <div class="text-secondary small">{{ $alumnus->designation ?? 'N/A' }}</div>
                                        </td>
                                        <td>
                                            @if ($alumnus->company_name)
                                                <span class="badge badge-company">
                                                    <i class="bi bi-building-check me-1"></i> {{ $alumnus->company_name }}
                                                </span>
                                            @else
                                                <span class="text-muted small">---</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="mailto:{{ $alumnus->email }}"
                                                class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                <i class="bi bi-envelope-at me-1"></i> Contact
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
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#alumniEmploymentTable').DataTable({
                "pageLength": 10,
                "responsive": true,
                "order": [
                    [1, "desc"]
                ], // Sort by Graduation Year
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search alumni or companies...",
                    "lengthMenu": "_MENU_ per page",
                    "paginate": {
                        "next": '<i class="bi bi-chevron-right"></i>',
                        "previous": '<i class="bi bi-chevron-left"></i>'
                    }
                },
                "drawCallback": function() {
                    // UI refinements after table draws
                    $('.dataTables_filter input').addClass('form-control shadow-sm mb-3');
                    $('.dataTables_length select').addClass('form-select form-select-sm');
                }
            });
        });
    </script>
@endsection
