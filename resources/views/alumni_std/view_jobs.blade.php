@extends('alumni_std.layouts.app')
@section('title', 'Job Details - ' . $job->title)

@section('content')
    <div class="job-detail-wrapper py-5">
        <div class="container px-lg-5">
            <nav aria-label="breadcrumb" class="mb-4">
                <a href="{{ route('alumni_std.jobs') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Job Board</span>
                </a>
            </nav>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="glass-card main-info-card p-4 p-md-5">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div class="brand-identity d-flex align-items-center">
                                <div class="company-logo-placeholder me-3">
                                    {{ substr($job->company_name, 0, 1) }}
                                </div>
                                <div>
                                    <h1 class="job-main-title">{{ $job->title }}</h1>
                                    <p class="company-subtitle">{{ $job->company_name }}</p>
                                </div>
                            </div>
                            <span class="badge-pill {{ $job->job_type == 'Internship' ? 'pill-intern' : 'pill-full' }}">
                                {{ $job->job_type }}
                            </span>
                        </div>

                        <div class="info-grid mb-5">
                            <div class="info-item">
                                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                                <div>
                                    <label>Location</label>
                                    <p>{{ $job->location }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="icon-box"><i class="fas fa-briefcase"></i></div>
                                <div>
                                    <label>Category</label>
                                    <p>{{ $job->category_name }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="icon-box"><i class="fas fa-calendar-alt"></i></div>
                                <div>
                                    <label>Posted Date</label>
                                    <p>{{ date('d M, Y', strtotime($job->created_at)) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="section-divider"></div>

                        <div class="content-section">
                            <h4 class="section-title">Description</h4>
                            <div class="description-text">
                                {!! nl2br(e($job->description)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px; z-index: 10;">
                        <div class="glass-card summary-card p-4">
                            <h5 class="fw-bold mb-4">Quick Summary</h5>

                            <div class="summary-list mb-4">
                                <div class="summary-row">
                                    <span class="label">Salary</span>
                                    <span
                                        class="value text-primary font-weight-bold">{{ $job->salary_range ?? 'Negotiable' }}</span>
                                </div>
                                <div class="summary-row">
                                    <span class="label">Deadline</span>
                                    <span
                                        class="value">{{ $job->deadline ? date('d M, Y', strtotime($job->deadline)) : 'Ongoing' }}</span>
                                </div>
                            </div>

                            <div class="action-box">
                                <button type="button" class="btn btn-premium-apply w-100 mb-3 py-3" data-bs-toggle="modal"
                                    data-bs-target="#jobApplyModal">
                                    Apply Now <i class="fas fa-paper-plane ms-2"></i>
                                </button>

                                <button type="button" class="btn btn-outline-share w-100 py-2" onclick="shareJob()">
                                    <i class="far fa-share-square me-2"></i> Share Opportunity
                                </button>
                            </div>

                            <div class="safety-note mt-4 p-3 bg-light rounded-3">
                                <small class="text-muted">
                                    <i class="fas fa-shield-alt text-success me-1"></i> Verified by
                                    {{ config('app.name') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="jobApplyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal-design">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-0">
                    <div class="text-center mb-4">
                        <div class="modal-icon-header mb-3">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Ready to Apply?</h4>
                        <p class="text-muted px-3">Send your professional CV directly to the recruitment team at
                            <strong>{{ $job->company_name }}</strong>.</p>
                    </div>

                    <div class="email-copy-card p-3 mb-4 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                            <i class="fas fa-at text-primary me-3"></i>
                            <span class="fw-bold text-truncate"
                                id="jobEmailAddress">{{ $job->email ?? 'recruitment@company.com' }}</span>
                        </div>
                        <button class="btn btn-primary btn-sm rounded-pill px-3" onclick="copyEmail()">Copy</button>
                    </div>

                    <a href="mailto:{{ $job->email ?? 'recruitment@company.com' }}?subject=Application for {{ $job->title }} (via {{ config('app.name') }})"
                        class="btn btn-dark w-100 py-3 rounded-4 shadow-sm fw-bold">
                        Open Mail App <i class="fas fa-external-link-alt ms-2"></i>
                    </a>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <p class="small text-muted mb-0">Good luck with your application!</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary-brand: #2563eb;
            --secondary-brand: #3b82f6;
            --glass-bg: rgba(255, 255, 255, 0.95);
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }

        .job-detail-wrapper {
            background: #f8fafc;
            min-height: 100vh;
        }

        .glass-card {
            background: var(--glass-bg);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 20px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }

        /* Modal Custom Design */
        .custom-modal-design {
            border-radius: 28px;
            border: none;
            overflow: hidden;
        }

        .modal-icon-header {
            width: 70px;
            height: 70px;
            background: #eff6ff;
            color: var(--primary-brand);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .email-copy-card {
            background: #f1f5f9;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .back-link {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--primary-brand);
        }

        .company-logo-placeholder {
            width: 60px;
            height: 60px;
            background: var(--primary-brand);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-radius: 15px;
        }

        .job-main-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-dark);
            margin: 0;
        }

        .company-subtitle {
            color: var(--primary-brand);
            font-weight: 600;
            margin-top: 2px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-box {
            width: 45px;
            height: 45px;
            background: #f1f5f9;
            color: var(--secondary-brand);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .info-item label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            margin: 0;
            display: block;
            letter-spacing: 0.5px;
        }

        .info-item p {
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .description-text {
            line-height: 1.8;
            color: #475569;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .btn-premium-apply {
            background: var(--text-dark);
            color: white;
            border-radius: 14px;
            font-weight: 700;
            border: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-premium-apply:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .btn-outline-share {
            background: white;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-weight: 600;
        }

        .badge-pill {
            padding: 6px 16px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.75rem;
        }

        .pill-intern {
            background: #d1fae5;
            color: #065f46;
        }

        .pill-full {
            background: #dbeafe;
            color: #1e40af;
        }

        .section-divider {
            height: 1px;
            background: #f1f5f9;
            margin: 30px 0;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyEmail() {
            const email = document.getElementById('jobEmailAddress').innerText;
            navigator.clipboard.writeText(email).then(() => {
                alert('Email copied to clipboard!');
            });
        }

        async function shareJob() {
            const shareData = {
                title: '{{ $job->title }}',
                text: 'Check out this job: {{ $job->title }} at {{ $job->company_name }}',
                url: window.location.href
            };
            if (navigator.share) {
                try {
                    await navigator.share(shareData);
                } catch (err) {
                    console.log(err);
                }
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert('Job link copied!');
            }
        }
    </script>
@endsection
