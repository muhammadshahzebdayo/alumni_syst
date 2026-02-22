@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --guide-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --soft-bg: #fdfdff;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        /* Glassmorphism Hero */
        .hero-banner {
            background: var(--guide-gradient);
            padding: 80px 0;
            color: white;
            border-radius: 0 0 40px 40px;
            position: relative;
            overflow: hidden;
        }

        /* Step Process UI */
        .process-line {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 30px;
        }

        .process-line::after {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e2e8f0;
            z-index: 1;
        }

        .process-step {
            background: white;
            z-index: 2;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 3px solid #7c3aed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #7c3aed;
        }

        /* Tab Styling */
        .nav-guide .nav-link {
            border: none;
            color: #64748b;
            padding: 15px 25px;
            font-weight: 600;
            border-radius: 12px;
            transition: 0.3s;
        }

        .nav-guide .nav-link.active {
            background: white;
            color: #4f46e5;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Content Cards */
        .guide-card {
            border: none;
            border-radius: 20px;
            background: white;
            transition: 0.3s ease;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
        }
    </style>

    <div class="hero-banner shadow-lg">
        <div class="container text-center">
            <h1 class="display-5 fw-bold mb-3">Help Center & User Manual</h1>
            <p class="fs-5 opacity-75">Smarter ways to manage, track, and engage your Alumni network.</p>
        </div>
    </div>

    <div class="container mt-n4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <ul class="nav nav-pills nav-guide bg-light p-2 rounded-4 shadow-sm mb-5" id="pills-tab" role="tablist">
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link active" id="pills-admin-tab" data-bs-toggle="pill" href="#pills-admin"><i
                                class="bi bi-shield-lock me-2"></i>Admin Master</a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" id="pills-alumni-tab" data-bs-toggle="pill" href="#pills-alumni"><i
                                class="bi bi-mortarboard me-2"></i>Alumni Access</a>
                    </li>
                    <li class="nav-item flex-fill text-center">
                        <a class="nav-link" id="pills-jobs-tab" data-bs-toggle="pill" href="#pills-jobs"><i
                                class="bi bi-briefcase me-2"></i>Job Board</a>
                    </li>
                </ul>

                <div class="tab-content mt-4" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-admin">
                        <div class="guide-card p-5 shadow-sm">
                            <h3 class="fw-bold text-dark mb-4">Core Administration Flow</h3>

                            <div class="process-line">
                                <div class="process-step">1</div>
                                <div class="process-step">2</div>
                                <div class="process-step">3</div>
                                <div class="process-step">4</div>
                            </div>

                            <div class="row g-4 mt-2">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 h-100">
                                        <h6 class="fw-bold text-primary"><i class="bi bi-person-plus-fill me-2"></i>User
                                            Onboarding</h6>
                                        <p class="small text-muted mb-0">Jab bhi naya alumni register hoga, aapko "Pending
                                            Approvals" mein list milegi. Document check karke status update karein.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-4 h-100">
                                        <h6 class="fw-bold text-primary"><i
                                                class="bi bi-gear-wide-connected me-2"></i>System Config</h6>
                                        <p class="small text-muted mb-0">Settings panel se Departments aur Graduation years
                                            manage karein jo filteration mein kaam aayenge.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 p-4 rounded-4" style="background: #eff6ff; border-left: 6px solid #3b82f6;">
                                <h6 class="fw-bold"><i class="bi bi-info-circle me-2"></i>Security Note:</h6>
                                <p class="mb-0 small">Admin panel ka password har 3 months baad change karna recommended hai
                                    taake database safe rahe.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-alumni">
                        <div class="guide-card p-5 shadow-sm">
                            <h3 class="fw-bold text-dark mb-4">Alumni Engagement Steps</h3>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="icon-box bg-primary text-white"><i class="bi bi-person-vcard"></i></div>
                                    <h5>Profile Update</h5>
                                    <p class="text-muted small">Alumni apna current job aur company name update kar sakta
                                        hai.</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon-box bg-success text-white"><i class="bi bi-search"></i></div>
                                    <h5>Job Search</h5>
                                    <p class="text-muted small">Live job board par filter karke latest vacancies dhoond
                                        sakta hai.</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon-box bg-warning text-dark"><i class="bi bi-chat-left-dots"></i></div>
                                    <h5>Networking</h5>
                                    <p class="text-muted small">Dosre alumni ki directory dekh kar connect kiya ja sakta
                                        hai.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-jobs">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="guide-card p-5 shadow-sm h-100">
                                    <h3 class="fw-bold text-dark mb-3">Job Life-Cycle</h3>
                                    <p class="text-muted">Nayi job post karte waqt ye cheezein lazmi hain:</p>
                                    <ul class="list-unstyled mt-4">
                                        <li class="mb-3 d-flex align-items-center">
                                            <i class="bi bi-patch-check-fill text-success me-3 fs-5"></i>
                                            <span>Title & Industry Category</span>
                                        </li>
                                        <li class="mb-3 d-flex align-items-center">
                                            <i class="bi bi-patch-check-fill text-success me-3 fs-5"></i>
                                            <span>Company Logo & Location</span>
                                        </li>
                                        <li class="mb-3 d-flex align-items-center">
                                            <i class="bi bi-patch-check-fill text-success me-3 fs-5"></i>
                                            <span>Application Deadline</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div
                                    class="guide-card p-4 bg-dark text-white h-100 d-flex flex-column justify-content-center text-center">
                                    <i class="bi bi-file-earmark-excel display-4 mb-3 text-success"></i>
                                    <h5>Export Data</h5>
                                    <p class="small opacity-75">Aap poori job list ko CSV mein export kar sakte hain.</p>
                                    <button class="btn btn-outline-light btn-sm rounded-pill mt-3">Learn How</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container my-5 py-4">
        <div class="card border-0 rounded-4 bg-white p-5 shadow-sm text-center">
            <h4 class="fw-bold">Still Need Help?</h4>
            <p class="text-muted">Agar aapko koi technical issue aa raha hai to hamari support team se rabta karein.</p>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="mailto:support@alumni.com" class="btn btn-primary px-4 rounded-pill">Email Support</a>
                <a href="#" class="btn btn-light px-4 rounded-pill border">Documentation PDF</a>
            </div>
        </div>
    </div>
@endsection
