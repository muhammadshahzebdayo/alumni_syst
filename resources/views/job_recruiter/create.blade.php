@extends('job_recruiter.layouts.app')
@section('title', 'Post New Vacancy')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <div class="container-fluid pt-5 px-4 pb-5 bg-layout">
        <div class="row mb-5 animate__animated animate__fadeInDown">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3">
                        <li class="breadcrumb-item"><a href="{{ route('job_recruiter.index') }}"
                                class="text-primary text-decoration-none fw-600">Dashboard</a></li>
                        <li class="breadcrumb-item active fw-600">Post Vacancy</li>
                    </ol>
                </nav>
                <h2 class="fw-800 text-dark mb-2">Create <span class="text-gradient">Job Opening</span></h2>
                <p class="text-muted fs-15">Target the right talent by providing detailed information about the role.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-24 overflow-hidden animate__animated animate__fadeInLeft">
                    <div class="card-header bg-white border-0 py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="icon-shape bg-primary-soft text-primary me-3">
                                <i class="fa fa-paper-plane fs-5"></i>
                            </div>
                            <h5 class="fw-700 mb-0">Job Specifications</h5>
                        </div>
                    </div>

                    <div class="card-body p-4 pt-2">
                        <form action="{{ route('job_recruiter.store') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <label class="custom-label">COMPANY NAME</label>
                                    <div class="input-wrapper">
                                        <i class="fa fa-building input-icon"></i>
                                        <input type="text" name="company_name"
                                            class="form-control premium-input @error('company_name') is-invalid @enderror"
                                            placeholder="e.g. Creative Solutions Pvt Ltd" value="{{ old('company_name') }}"
                                            required>
                                    </div>
                                    @error('company_name')
                                        <div class="error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="custom-label">POSITION TITLE</label>
                                    <div class="input-wrapper">
                                        <i class="fa fa-briefcase input-icon"></i>
                                        <input type="text" name="title"
                                            class="form-control premium-input @error('title') is-invalid @enderror"
                                            placeholder="e.g. Senior UI/UX Designer" value="{{ old('title') }}" required>
                                    </div>
                                    @error('title')
                                        <div class="error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="custom-label">INDUSTRY CATEGORY</label>
                                    <select name="category_id" class="form-select premium-input select-icon" required>
                                        <option value="" disabled selected>Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}"
                                                {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="custom-label">EMPLOYMENT TYPE</label>
                                    <div class="job-type-pill-container p-1 d-flex bg-light rounded-pill">
                                        <input type="radio" class="btn-check" name="job_type" id="full"
                                            value="Full-time"
                                            {{ old('job_type', 'Full-time') == 'Full-time' ? 'checked' : '' }}>
                                        <label class="btn pill-btn rounded-pill flex-grow-1"
                                            for="full">Full-time</label>

                                        <input type="radio" class="btn-check" name="job_type" id="part"
                                            value="Part-time" {{ old('job_type') == 'Part-time' ? 'checked' : '' }}>
                                        <label class="btn pill-btn rounded-pill flex-grow-1"
                                            for="part">Part-time</label>

                                        <input type="radio" class="btn-check" name="job_type" id="rem"
                                            value="Remote" {{ old('job_type') == 'Remote' ? 'checked' : '' }}>
                                        <label class="btn pill-btn rounded-pill flex-grow-1" for="rem">Remote</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="custom-label">LOCATION</label>
                                    <div class="input-wrapper">
                                        <i class="fa fa-map-marker-alt input-icon"></i>
                                        <input type="text" name="location"
                                            class="form-control premium-input @error('location') is-invalid @enderror"
                                            placeholder="e.g. Karachi, Pakistan or Remote" value="{{ old('location') }}"
                                            required>
                                    </div>
                                    @error('location')
                                        <div class="error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="custom-label">MONTHLY SALARY (OPTIONAL)</label>
                                    <div class="input-wrapper">
                                        <span class="prefix-label">PKR</span>
                                        <input type="text" name="salary_range" class="form-control premium-input ps-5"
                                            placeholder="e.g. 80,000 - 120,000" value="{{ old('salary_range') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="custom-label">CLOSING DATE</label>
                                    <div class="input-wrapper">
                                        <i class="fa fa-calendar-alt input-icon"></i>
                                        <input type="date" name="deadline" class="form-control premium-input"
                                            value="{{ old('deadline') }}" required>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <div class="col-md-12">
                                    <label class="custom-label">JOB DESCRIPTION & REQUIREMENTS</label>
                                    <textarea name="description" rows="5"
                                        class="form-control premium-input py-3 @error('description') is-invalid @enderror"
                                        placeholder="Outline duties, requirements and benefits...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="error-msg">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="action-bar d-flex align-items-center justify-content-between p-3">
                                        <button type="reset"
                                            class="btn btn-link text-secondary text-decoration-none fw-700 px-4">Reset
                                            Fields</button>
                                        <div class="d-flex gap-3">
                                            <a href="{{ route('job_recruiter.index') }}"
                                                class="btn btn-outline-light text-dark border rounded-pill px-4 fw-600">Cancel</a>
                                            <button type="submit"
                                                class="btn btn-gradient-primary rounded-pill px-5 py-2 fw-700 shadow-premium">
                                                Publish Now <i class="fa fa-rocket ms-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div
                        class="card border-0 bg-dark text-white rounded-24 shadow-lg mb-4 glass-card overflow-hidden animate__animated animate__fadeInRight">
                        <div class="card-body p-4 position-relative">
                            <div class="pulse-circle"></div>
                            <h5 class="fw-700 mb-3 d-flex align-items-center">
                                <span class="bg-warning rounded-circle me-2 d-inline-block"
                                    style="width: 10px; height: 10px;"></span>
                                Recruiting Tips
                            </h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex mb-3 align-items-start">
                                    <i class="fa fa-check-circle text-primary me-2 mt-1"></i>
                                    <p class="small mb-0 opacity-75">Specific job titles attract 30% more qualified
                                        candidates.</p>
                                </li>
                                <li class="d-flex mb-3 align-items-start">
                                    <i class="fa fa-check-circle text-primary me-2 mt-1"></i>
                                    <p class="small mb-0 opacity-75">Clearly state the required years of experience.</p>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="fa fa-check-circle text-primary me-2 mt-1"></i>
                                    <p class="small mb-0 opacity-75">Adding salary range increases applicant trust.</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div
                        class="card border-0 shadow-sm rounded-24 bg-white text-center p-4 animate__animated animate__fadeInRight animate__delay-1s">
                        <div class="preview-icon mx-auto mb-3">
                            <i class="fa fa-eye text-primary"></i>
                        </div>
                        <h6 class="fw-700 mb-1">Live Preview</h6>
                        <p class="text-muted small mb-4">See how your vacancy will look to the candidates.</p>
                        <button class="btn btn-outline-primary w-100 rounded-pill fw-700 border-2">Layout Preview</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Style and CSS remains same as original --}}
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-soft: rgba(37, 99, 235, 0.1);
            --bg-layout: #f8fafc;
            --text-dark: #0f172a;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-layout);
        }

        .fw-600 {
            font-weight: 600;
        }

        .fw-700 {
            font-weight: 700;
        }

        .fw-800 {
            font-weight: 800;
        }

        .fs-15 {
            font-size: 15px;
        }

        .text-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .rounded-24 {
            border-radius: 24px;
        }

        /* Icon Shape */
        .icon-shape {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
        }

        /* Input Styling */
        .custom-label {
            font-size: 11px;
            font-weight: 800;
            color: #64748b;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
            display: block;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            transition: 0.3s;
        }

        .premium-input {
            background: #ffffff;
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            padding: 14px 20px 14px 50px;
            font-weight: 500;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .premium-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            background: #fff;
        }

        .prefix-label {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 800;
            font-size: 12px;
            color: var(--primary);
        }

        /* Pill Buttons */
        .job-type-pill-container {
            border: 1px solid #e2e8f0;
        }

        .pill-btn {
            border: none;
            font-size: 13px;
            font-weight: 700;
            color: #64748b;
            padding: 10px;
            transition: 0.3s;
        }

        .btn-check:checked+.pill-btn {
            background: white !important;
            color: var(--primary);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Action Bar */
        .action-bar {
            background: #f1f5f9;
            border-radius: 20px;
            border: 1px solid #fff;
        }

        /* Buttons */
        .btn-gradient-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            transition: transform 0.3s ease;
        }

        .btn-gradient-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
            color: white;
        }

        /* Glass Card */
        .glass-card {
            background: #1e293b !important;
            position: relative;
        }

        .pulse-circle {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: var(--primary);
            filter: blur(50px);
            opacity: 0.3;
        }

        .preview-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-soft);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .error-msg {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
            font-weight: 600;
        }
    </style>
@endsection
