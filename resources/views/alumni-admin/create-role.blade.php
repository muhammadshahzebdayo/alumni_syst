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

        /* Page Header Background */
        .auth-bg {
            padding: 80px 0;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            margin-bottom: -100px;
        }

        /* Centered Premium Card */
        .role-creation-card {
            border: none;
            border-radius: 24px;
            background: #ffffff;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        /* Decorative Circle */
        .role-creation-card::after {
            content: "";
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: rgba(99, 102, 241, 0.05);
            border-radius: 50%;
        }

        .form-label {
            font-weight: 700;
            color: #1e293b;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control-lg {
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            padding: 14px 18px;
            font-size: 1rem;
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control-lg:focus {
            background-color: #ffffff;
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        /* Creative Buttons */
        .btn-save-role {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        .btn-save-role:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 20px -5px rgba(79, 70, 229, 0.4);
            color: white;
            opacity: 0.9;
        }

        .btn-view-all {
            border: 2px solid #e2e8f0;
            color: #64748b;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-view-all:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #1e293b;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #eef2ff;
            color: #6366f1;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            font-size: 1.5rem;
        }
    </style>

    <div class="auth-bg">
        <div class="container text-center">
            <h2 class="text-white fw-700">Access Control</h2>
            <p class="text-white-50">Define new permissions for your community</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="role-creation-card mt-5">
                    <div class="icon-box">
                        <i class="bi bi-shield-lock"></i>
                    </div>

                    <h4 class="text-center fw-700 mb-4 text-dark">Create New Role</h4>

                    @if (session('success'))
                        <div class="alert alert-success border-0 rounded-3 shadow-sm d-flex align-items-center mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <small class="fw-600">{{ session('success') }}</small>
                        </div>
                    @endif

                    <form action="{{ url('alumni-admin/store-role') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label mb-2 ms-1">Enter Role Identity</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-3"
                                    style="border: 2px solid #e2e8f0;">
                                    <i class="bi bi-person-badge text-muted"></i>
                                </span>
                                <input type="text" name="role_name"
                                    class="form-control form-control-lg border-start-0 @error('role_name') is-invalid @enderror"
                                    placeholder="e.g. Content Moderator" value="{{ old('role_name') }}" required>
                            </div>
                            @error('role_name')
                                <div class="text-danger small mt-2 ms-1 fw-500">
                                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-save-role">
                                <i class="bi bi-shield-check me-2"></i> Confirm & Save Role
                            </button>

                            <div class="text-center my-2">
                                <span class="text-muted small fw-600">OR</span>
                            </div>

                            <a href="{{ url('alumni-admin/view-roles') }}" class="btn btn-view-all">
                                <i class="bi bi-arrow-left-short fs-4"></i> Back to All Roles
                            </a>
                        </div>
                    </form>
                </div>

                <p class="text-center text-muted mt-4 small">
                    <i class="bi bi-info-circle me-1"></i> New roles will be immediately available in the user assignment
                    list.
                </p>
            </div>
        </div>
    </div>
@endsection
