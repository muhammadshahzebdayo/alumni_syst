@extends('job_recruiter.layouts.app')
@section('title', 'Brand Studio Pro | Customizer')

@section('content')
    <div class="studio-wrapper pb-5">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        <div class="container-xl position-relative pt-5">
            <div
                class="glass-header d-flex flex-column flex-md-row align-items-md-center justify-content-between p-4 mb-5 animate-slide-down">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item"><a href="#"
                                    class="text-primary-gradient fw-bold text-decoration-none">STUDIO</a></li>
                            <li class="breadcrumb-item active fw-bold text-muted">CUSTOMIZER</li>
                        </ol>
                    </nav>
                    <h2 class="fw-black m-0 text-dark tracking-tight">Identity <span class="text-gradient">Architect</span>
                    </h2>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ url('job_recruiter/company_profile') }}" class="btn-exit">
                        <i class="fa fa-arrow-left me-2"></i> Exit Studio
                    </a>
                </div>
            </div>

            <form action="{{ route('job_recruiter.update_profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="identity-card sticky-top" style="top: 20px;">
                            <div class="card-glow"></div>
                            <div class="p-5 text-center position-relative">
                                <div class="avatar-container mx-auto mb-4">
                                    <div class="avatar-border-rotate"></div>
                                    <img id="logo-preview"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($recruiter->first_name) }}&background=6366f1&color=fff&size=200"
                                        class="avatar-img shadow-lg">
                                    <label for="logo-upload" class="edit-badge">
                                        <i class="fa fa-camera"></i>
                                        <input type="file" id="logo-upload" name="logo" class="d-none"
                                            accept="image/*">
                                    </label>
                                </div>

                                <h3 class="fw-black text-dark mb-1">{{ $recruiter->first_name }} {{ $recruiter->last_name }}
                                </h3>
                                <p class="text-primary fw-bold small text-uppercase tracking-widest mb-4">
                                    <i class="fa fa-shield-check me-1"></i>
                                    {{ $recruiter_data->company_name ?? 'Recruiter' }}
                                </p>

                                <div class="brand-stats p-3 rounded-4 mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="small fw-bold text-muted">Brand Power</span>
                                        <span class="small fw-black text-primary">85%</span>
                                    </div>
                                    <div class="progress-container">
                                        <div class="progress-fill" style="width: 85%"></div>
                                    </div>
                                </div>

                                <div class="status-indicator">
                                    <span class="pulse-dot"></span> Studio Mode Active
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="form-section-card p-4 p-md-5 mb-4">
                            <div class="d-flex align-items-center mb-5">
                                <div class="icon-orb me-3"><i class="fa fa-id-card"></i></div>
                                <div>
                                    <h4 class="fw-black m-0">Leadership Profile</h4>
                                    <p class="text-muted small m-0">Define how you appear to your network</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="premium-input-group">
                                        <input type="text" name="first_name" class="premium-input"
                                            value="{{ $recruiter->first_name }}" required placeholder=" ">
                                        <label class="premium-label">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="premium-input-group">
                                        <input type="text" name="last_name" class="premium-input"
                                            value="{{ $recruiter->last_name }}" required placeholder=" ">
                                        <label class="premium-label">Last Name</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section-card p-4 p-md-5 mb-4">
                            <div class="d-flex align-items-center mb-5">
                                <div class="icon-orb blue me-3"><i class="fa fa-building"></i></div>
                                <div>
                                    <h4 class="fw-black m-0">Business Assets</h4>
                                    <p class="text-muted small m-0">Organization details and headquarters</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="premium-input-group">
                                        <i class="fa fa-link input-icon"></i>
                                        <input type="text" name="company_name" class="premium-input icon-pad"
                                            value="{{ $recruiter_data->company_name ?? '' }}" placeholder=" ">
                                        <label class="premium-label icon-pad">Company Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="premium-input-group">
                                        <i class="fa fa-phone input-icon"></i>
                                        <input type="text" name="phone_number" class="premium-input icon-pad"
                                            value="{{ $recruiter->phone_number ?? '' }}" placeholder=" ">
                                        <label class="premium-label icon-pad">Contact Line</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="premium-input-group">
                                        <i class="fa fa-map-marker-alt input-icon"></i>
                                        <input type="text" name="address" class="premium-input icon-pad"
                                            value="{{ $recruiter->address ?? '' }}" placeholder=" ">
                                        <label class="premium-label icon-pad">Location</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="action-bar p-3 d-flex justify-content-between align-items-center shadow-lg">
                            <span class="text-muted small fw-bold d-none d-md-inline ms-3">
                                <i class="fa fa-info-circle me-1"></i> Unsaved changes will be lost
                            </span>
                            <div class="d-flex gap-2">
                                <button type="reset" class="btn-discard">Discard</button>
                                <button type="submit" class="btn-save">
                                    Sync Identity <i class="fa fa-sync-alt ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --bg-studio: #f8fafc;
            --glass: rgba(255, 255, 255, 0.7);
            --border: rgba(226, 232, 240, 0.8);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-studio);
            overflow-x: hidden;
        }

        /* Background Orbs */
        .studio-wrapper {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            opacity: 0.5;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: #c7d2fe;
            top: -10%;
            left: -10%;
        }

        .orb-2 {
            width: 300px;
            height: 300px;
            background: #e0e7ff;
            bottom: 10%;
            right: -5%;
        }

        .orb-3 {
            width: 250px;
            height: 250px;
            background: #f0f9ff;
            top: 40%;
            right: 20%;
        }

        /* Typography */
        .fw-black {
            font-weight: 800;
        }

        .text-gradient {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .tracking-tight {
            letter-spacing: -1.5px;
        }

        /* Glass Header */
        .glass-header {
            background: var(--glass);
            backdrop-filter: blur(15px);
            border: 1px solid white;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        /* Identity Card */
        .identity-card {
            background: white;
            border-radius: 30px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.04);
            position: relative;
        }

        .card-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #6366f1, #a855f7, #6366f1);
            background-size: 200% 100%;
            animation: gradientMove 3s linear infinite;
        }

        /* Avatar Design */
        .avatar-container {
            width: 150px;
            height: 150px;
            position: relative;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 40px;
            object-fit: cover;
            border: 4px solid white;
            position: relative;
            z-index: 2;
        }

        .avatar-border-rotate {
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px dashed #6366f1;
            border-radius: 45px;
            animation: rotate 10s linear infinite;
        }

        .edit-badge {
            position: absolute;
            bottom: -5px;
            right: -5px;
            width: 40px;
            height: 40px;
            background: #000;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 3;
            transition: 0.3s;
        }

        .edit-badge:hover {
            transform: scale(1.1);
            background: var(--primary);
        }

        /* Premium Inputs */
        .form-section-card {
            background: white;
            border-radius: 30px;
            border: 1px solid var(--border);
        }

        .premium-input-group {
            position: relative;
        }

        .premium-input {
            width: 100%;
            padding: 18px 24px;
            border-radius: 16px;
            border: 2px solid #f1f5f9;
            background: #f8fafc;
            font-weight: 600;
            transition: 0.3s;
            outline: none;
        }

        .premium-input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .premium-label {
            position: absolute;
            left: 24px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            transition: 0.3s;
            font-weight: 600;
        }

        .premium-input:focus+.premium-label,
        .premium-input:not(:placeholder-shown)+.premium-label {
            top: -10px;
            left: 15px;
            font-size: 11px;
            color: white;
            background: #000;
            padding: 2px 10px;
            border-radius: 6px;
        }

        .icon-pad {
            padding-left: 55px !important;
        }

        .input-icon {
            position: absolute;
            left: 22px;
            top: 50%;
            transform: translateY(-50%);
            color: #6366f1;
            opacity: 0.6;
        }

        /* Action Bar */
        .action-bar {
            background: var(--glass);
            backdrop-filter: blur(15px);
            border: 1px solid white;
            border-radius: 20px;
            position: sticky;
            bottom: 20px;
            z-index: 100;
        }

        .btn-save {
            background: #000;
            color: #fff;
            border: none;
            padding: 14px 30px;
            border-radius: 14px;
            font-weight: 700;
            transition: 0.3s;
        }

        .btn-save:hover {
            background: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-discard {
            background: transparent;
            border: none;
            color: #64748b;
            font-weight: 700;
            padding: 0 20px;
        }

        .btn-exit {
            padding: 10px 20px;
            border-radius: 12px;
            background: #fff;
            border: 1px solid #e2e8f0;
            color: #1e293b;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-exit:hover {
            background: #f8fafc;
            transform: translateX(-5px);
        }

        /* Animations */
        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-slide-down {
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .pulse-dot {
            height: 8px;
            width: 8px;
            background-color: #10b981;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .icon-orb {
            width: 48px;
            height: 48px;
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .icon-orb.blue {
            background: rgba(56, 189, 248, 0.1);
            color: #0ea5e9;
        }
    </style>

    <script>
        // Image Preview with Smooth Transition
        document.getElementById('logo-upload').onchange = evt => {
            const [file] = document.getElementById('logo-upload').files;
            if (file) {
                const preview = document.getElementById('logo-preview');
                preview.style.opacity = '0';
                setTimeout(() => {
                    preview.src = URL.createObjectURL(file);
                    preview.style.opacity = '1';
                }, 300);
            }
        }
    </script>
@endsection
