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
            padding: 40px 0;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            /* Purple-Indigo Gradient */
            margin-bottom: -40px;
            color: white;
        }

        /* Professional Card */
        .role-card {
            border: none;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        /* Avatar Design */
        .avatar-circle {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-weight: 700;
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #4f46e5;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        /* Badge Styling */
        .badge-role {
            padding: 6px 14px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
        }

        .role-admin {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #10b981;
        }

        .role-none {
            background: #fff7ed;
            color: #c2410c;
            border: 1px solid #f97316;
        }

        /* Table & Select Polish */
        .table thead th {
            background-color: #f8fafc;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            padding: 15px;
        }

        .form-select-custom {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            font-size: 0.85rem;
            padding: 5px 10px;
            transition: all 0.2s;
        }

        .form-select-custom:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        /* Create Button */
        .btn-create-role {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-create-role:hover {
            background: white;
            color: #4f46e5;
            transform: translateY(-2px);
        }

        /* Update Button */
        .btn-update-role {
            background: #1e293b;
            color: white;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.8rem;
            padding: 6px 15px;
            transition: 0.2s;
        }

        .btn-update-role:hover {
            background: #0f172a;
            color: white;
            transform: scale(1.05);
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 24px;
            border: none;
        }

        .modal-header {
            border-bottom: 1px solid #f1f5f9;
            padding: 25px;
        }
    </style>

    <div class="app-content-header">
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-700 mb-1"><i class="bi bi-shield-lock-fill me-2"></i> User Role Management</h3>
                    <p class="text-white-50 small mb-0">Securely assign access levels and manage permissions</p>
                </div>
                <button class="btn btn-create-role shadow-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                    <i class="bi bi-plus-lg me-1"></i> Create New Role
                </button>
            </div>
        </div>
    </div>

    <div class="app-content mt-4">
        <div class="container-fluid px-4">

            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center">
                    <i class="bi bi-check-all fs-4 me-2"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card role-card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="userRoleTable">
                            <thead>
                                <tr>
                                    <th class="ps-4">User Information</th>
                                    <th>Contact Details</th>
                                    <th>Access Status</th>
                                    <th class="text-center no-sort">Modify Permissions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3">
                                                    {{ strtoupper(substr($user->first_name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $user->first_name }}
                                                        {{ $user->last_name }}</div>
                                                    <small class="text-muted">UID: #{{ $user->user_id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-dark small fw-medium">{{ $user->email }}</div>
                                        </td>
                                        <td>
                                            @if ($user->role_name)
                                                <span class="badge-role role-admin">
                                                    <i class="bi bi-person-check-fill me-1"></i> {{ $user->role_name }}
                                                </span>
                                            @else
                                                <span class="badge-role role-none">
                                                    <i class="bi bi-exclamation-triangle-fill me-1"></i> No Role
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ url('alumni-admin/roles-assign') }}" method="POST"
                                                class="d-flex justify-content-center gap-2 px-3">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">

                                                <select name="role_id" class="form-select form-select-custom w-100"
                                                    required>
                                                    <option value="" disabled selected>-- Assign Role --</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->role_id }}"
                                                            {{ (isset($user->role_id) && $user->role_id == $role->role_id) || $user->role_name == $role->role_name ? 'selected' : '' }}>
                                                            {{ $role->role_name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <button type="submit" class="btn btn-update-role">
                                                    Apply
                                                </button>
                                            </form>
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

    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-700 text-dark"><i class="bi bi-shield-plus me-2 text-primary"></i>Define New
                        Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ url('alumni-admin/store-role') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label text-uppercase fw-700 small text-muted mb-2">Role Name</label>
                            <input type="text" name="role_name" class="form-control py-3 rounded-4"
                                placeholder="e.g. Senior Admin / Moderator" required>
                            <small class="text-muted mt-2 d-block">This role will be available for all system users.</small>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4 pt-0">
                        <button type="button" class="btn btn-light px-4 py-2 rounded-3 fw-600"
                            data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-600 shadow-sm">Create
                            Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#userRoleTable').DataTable({
                "pageLength": 10,
                "responsive": true,
                "columnDefs": [{
                    "targets": "no-sort",
                    "orderable": false
                }],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search names, emails or roles...",
                    "lengthMenu": "_MENU_ per page"
                }
            });

            // Customize search bar
            $('.dataTables_filter input').addClass('form-control shadow-sm mb-3').css('width', '250px');
        });
    </script>
@endsection
