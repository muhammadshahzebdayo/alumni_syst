@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-dark: #0f172a;
            --accent-blue: #38bdf8;
            --soft-slate: #f8fafc;
            --code-bg: #1e293b;
        }

        body {
            background-color: #f1f5f9;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Header Section */
        .hero-setup {
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
            padding: 80px 0 120px;
            color: white;
            border-radius: 0 0 60px 60px;
            margin-bottom: -60px;
        }

        /* Timeline / Roadmap Style */
        .setup-container {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }

        .timeline-step {
            position: relative;
            background: white;
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .timeline-step:hover {
            transform: translateY(-5px);
        }

        .step-badge {
            position: absolute;
            top: -20px;
            left: 40px;
            background: var(--accent-blue);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 800;
            box-shadow: 0 4px 12px rgba(56, 189, 248, 0.4);
        }

        /* Code Styling */
        .code-wrapper {
            background: var(--code-bg);
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            position: relative;
        }

        code {
            font-family: 'Fira Code', monospace;
            color: #cbd5e1;
            font-size: 0.9rem;
            display: block;
            line-height: 1.6;
        }

        .cmd-prefix {
            color: #38bdf8;
            user-select: none;
            margin-right: 10px;
        }

        .comment {
            color: #64748b;
            font-style: italic;
            display: block;
            margin-bottom: 5px;
        }

        /* Requirement Pills */
        .req-pill {
            background: #f1f5f9;
            color: #475569;
            padding: 5px 15px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 10px;
        }
    </style>

    <div class="hero-setup text-center">
        <div class="container">
            <span class="badge bg-info text-dark mb-3 fw-bold px-3 py-2">v2.0 STABLE</span>
            <h1 class="display-4 fw-800">System Installation Guide</h1>
            <p class="lead opacity-75">Follow this roadmap to deploy the Alumni Management System locally or on a server.</p>

            <div class="mt-4">
                <span class="req-pill"><i class="bi bi-check2-circle me-1"></i> PHP 8.1+</span>
                <span class="req-pill"><i class="bi bi-check2-circle me-1"></i> Composer 2.x</span>
                <span class="req-pill"><i class="bi bi-check2-circle me-1"></i> MySQL 8.0</span>
                <span class="req-pill"><i class="bi bi-check2-circle me-1"></i> Node.js 16+</span>
            </div>
        </div>
    </div>

    <div class="container setup-container pb-5">

        <div class="timeline-step shadow">
            <div class="step-badge">STEP 01</div>
            <h4 class="fw-bold mt-2"><i class="bi bi-git me-2 text-primary"></i> Clone & Source Setup</h4>
            <p class="text-muted">Sab se pehle project repository ko apne local machine par clone karein aur project
                directory mein move karein.</p>

            <div class="code-wrapper">
                <code>
                    <span class="comment">// Clone the repository</span>
                    <span class="cmd-prefix">$</span>git clone https://github.com/your-username/alumni-portal.git<br>
                    <span class="comment">// Navigate to the folder</span>
                    <span class="cmd-prefix">$</span>cd alumni-portal
                </code>
            </div>
        </div>

        <div class="timeline-step shadow">
            <div class="step-badge">STEP 02</div>
            <h4 class="fw-bold mt-2"><i class="bi bi-box-seam me-2 text-primary"></i> Package Installation</h4>
            <p class="text-muted">Backend (Laravel) aur Frontend (Assets) ki tamam dependencies install karein.</p>

            <div class="code-wrapper">
                <code>
                    <span class="comment">// Install Laravel dependencies</span>
                    <span class="cmd-prefix">$</span>composer install<br><br>
                    <span class="comment">// Install Frontend dependencies</span>
                    <span class="cmd-prefix">$</span>npm install && npm run dev
                </code>
            </div>
        </div>

        <div class="timeline-step shadow">
            <div class="step-badge">STEP 03</div>
            <h4 class="fw-bold mt-2"><i class="bi bi-sliders me-2 text-primary"></i> Environment Configuration</h4>
            <p class="text-muted">`.env` file create karein aur apna **Database Name**, **Username**, aur **Password** set
                karein.</p>

            <div class="code-wrapper">
                <code>
                    <span class="comment">// Copy environment file</span>
                    <span class="cmd-prefix">$</span>cp .env.example .env<br>
                    <span class="comment">// Generate application key</span>
                    <span class="cmd-prefix">$</span>php artisan key:generate
                </code>
            </div>
            <div class="alert bg-light border-start border-4 border-info">
                <small class="fw-bold"><i class="bi bi-info-circle-fill me-2 text-info"></i>Tip:</small>
                <small>Open <code>.env</code> file and update <code>DB_DATABASE</code>, <code>DB_USERNAME</code>, and
                    <code>DB_PASSWORD</code>.</small>
            </div>
        </div>

        <div class="timeline-step shadow border-primary border-top border-5">
            <div class="step-badge">STEP 04</div>
            <h4 class="fw-bold mt-2"><i class="bi bi-database-check me-2 text-primary"></i> Database Migration & Seeding
            </h4>
            <p class="text-muted">Database tables create karein aur default roles/admin data populate karein.</p>

            <div class="code-wrapper">
                <code>
                    <span class="comment">// Run migrations and seed the database</span>
                    <span class="cmd-prefix">$</span>php artisan migrate --seed
                </code>
            </div>

            <div class="bg-dark text-white p-3 rounded-3 small mt-3">
                <div class="d-flex justify-content-between">
                    <span><i class="bi bi-person-badge me-2"></i> Default Admin:</span>
                    <span class="text-info">admin@example.com</span>
                </div>
                <div class="d-flex justify-content-between mt-1">
                    <span><i class="bi bi-key me-2"></i> Default Password:</span>
                    <span class="text-info">password</span>
                </div>
            </div>
        </div>

        <div class="timeline-step shadow">
            <div class="step-badge">STEP 05</div>
            <h4 class="fw-bold mt-2"><i class="bi bi-rocket-takeoff me-2 text-primary"></i> Storage Link & Launch</h4>
            <p class="text-muted">Final step: Images upload ke liye symbolic link banayein aur server run karein.</p>

            <div class="code-wrapper">
                <code>
                    <span class="comment">// Link storage folder</span>
                    <span class="cmd-prefix">$</span>php artisan storage:link<br>
                    <span class="comment">// Start local server</span>
                    <span class="cmd-prefix">$</span>php artisan serve
                </code>
            </div>

            <div class="text-center mt-4">
                <div class="alert alert-success d-inline-block px-5 rounded-pill shadow-sm">
                    <i class="bi bi-browser-chrome me-2"></i> System live at: <strong>http://127.0.0.1:8000</strong>
                </div>
            </div>
        </div>

    </div>

    <div class="container mb-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <h5 class="fw-bold"><i class="bi bi-question-diamond-fill me-2 text-warning"></i> Common Issues?</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p class="small mb-1"><strong>Permission Denied?</strong></p>
                    <p class="text-muted small">Run: <code>chmod -R 775 storage bootstrap/cache</code></p>
                </div>
                <div class="col-md-6">
                    <p class="small mb-1"><strong>Composer Error?</strong></p>
                    <p class="text-muted small">Update composer using: <code>composer self-update</code></p>
                </div>
            </div>
        </div>
    </div>
@endsection
