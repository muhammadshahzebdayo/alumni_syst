@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --brand-gradient: linear-gradient(135deg, #6366f1 0%, #4338ca 100%);
        }

        body {
            background-color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Header & Section Styling */
        .app-content-header {
            padding: 30px 0;
            background: var(--brand-gradient);
            color: white;
            margin-bottom: 20px;
        }

        .section-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .card-header-custom {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 20px;
            border-radius: 16px 16px 0 0 !important;
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.85rem;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 10px 15px;
            transition: all 0.2s;
            background-color: #fcfdfe;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        /* Button Styling */
        .btn-publish {
            background: var(--brand-gradient);
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-publish:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
            color: white;
        }

        /* Table Styling */
        .job-table thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px;
            border: none;
        }

        .job-table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Status Badges */
        .badge-active {
            background: #dcfce7;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .badge-expired {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        /* DataTable Customization */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--brand-gradient) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px;
        }
    </style>

    <div class="app-content-header shadow-sm">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="fw-bold mb-0">Career Opportunity Hub</h3>
                    <p class="text-white-50 mb-0">Empowering alumni through meaningful job placements</p>
                </div>
                <div class="col-sm-6 text-end">
                    <i class="bi bi-briefcase fs-1 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid px-4">

            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i> {{ session('success') }}
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card section-card mb-5">
                <div class="card-header-custom">
                    <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-plus-circle me-2 text-primary"></i>Post a New Job
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('alumni-admin/store-job') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Job Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="e.g. Senior Laravel Developer" value="{{ old('title') }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <input list="company_list" name="company_name"
                                    class="form-control @error('company_name') is-invalid @enderror"
                                    placeholder="Select or type new company" value="{{ old('company_name') }}" required>
                                <datalist id="company_list">
                                    @foreach ($companies as $comp)
                                        <option value="{{ $comp->company_name }}">
                                    @endforeach
                                </datalist>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Job Category</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->category_id }}"
                                            {{ old('category_id') == $cat->category_id ? 'selected' : '' }}>
                                            {{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Job Type</label>
                                <select name="job_type" class="form-select">
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Remote">Remote</option>
                                    <option value="Internship">Internship</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Application Deadline</label>
                                <input type="date" name="deadline" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" placeholder="City, Country"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Salary Range (Optional)</label>
                                <input type="text" name="salary_range" class="form-control" placeholder="e.g. 60k - 90k">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Job Description</label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Briefly describe roles & requirements..."
                                    required>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-light px-4 rounded-3">Reset</button>
                            <button type="submit" class="btn btn-publish px-5">Publish Now</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card section-card">
                <div class="card-header-custom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Recent Postings</h5>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">{{ count($jobs) }} Total
                        Jobs</span>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table job-table" id="jobsDataTable">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>Category</th>
                                    <th>Posted On</th>
                                    <th>Deadline</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $job->title }}</div>
                                            <small class="text-primary fw-medium">{{ $job->job_type }}</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2 bg-light rounded p-1 text-center"
                                                    style="width:30px">
                                                    <i class="bi bi-building text-muted"></i>
                                                </div>
                                                {{ $job->company_name }}
                                            </div>
                                        </td>
                                        <td><span class="text-muted">{{ $job->category_name }}</span></td>
                                        <td>{{ date('d M Y', strtotime($job->created_at)) }}</td>
                                        <td>
                                            @php $isExpired = strtotime($job->deadline) < time(); @endphp
                                            <span class="{{ $isExpired ? 'text-danger fw-bold' : 'text-dark' }}">
                                                {{ date('d M Y', strtotime($job->deadline)) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge rounded-pill px-3 py-2 {{ $job->status == 'Active' ? 'badge-active' : 'badge-expired' }}">
                                                {{ $job->status }}
                                            </span>
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
            $('#jobsDataTable').DataTable({
                "pageLength": 10,
                "order": [
                    [3, "desc"]
                ], // Sort by Posted Date by default
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search jobs, companies...",
                    "lengthMenu": "Show _MENU_ entries"
                },
                "drawCallback": function() {
                    $('.dataTables_filter input').addClass('form-control shadow-sm mb-3').css('width',
                        '300px');
                    $('.dataTables_paginate').addClass('mt-3');
                }
            });
        });
    </script>
@endsection
