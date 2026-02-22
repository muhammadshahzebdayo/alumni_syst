@extends('alumni_std.layouts.app')
@section('title', 'Jobs & Internships')

@section('content')
    <div class="container-fluid py-5 px-lg-5">
        <div class="row mb-5">
            <div class="col-lg-8">
                <h2 class="fw-black text-dark mb-2" style="letter-spacing: -1px;">Explore <span
                        class="text-gradient">Opportunities</span></h2>
                <p class="text-muted lead">Your bridge to the professional world starts here.</p>
            </div>
            <div class="col-lg-4 text-lg-end pt-3">
                <div class="stats-badge bg-white shadow-sm border rounded-pill d-inline-flex align-items-center px-4 py-2">
                    <span class="badge bg-primary rounded-circle me-2 p-2"><i class="fas fa-briefcase"></i></span>
                    <span class="small fw-bold text-dark">{{ $jobs->total() }} Active Postings</span>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="filter-wrapper bg-white p-3 rounded-4 shadow-sm border">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-5">
                            <form action="{{ url()->current() }}" method="GET">
                                <div class="input-group search-pill border rounded-pill px-3">
                                    <i class="fas fa-search text-primary mt-3 me-2"></i>
                                    <input type="text" name="search" class="form-control border-0 shadow-none"
                                        placeholder="Job title, company or skill..." value="{{ request('search') }}">
                                    <button class="btn btn-primary rounded-pill my-1 px-4 fw-bold">Find Jobs</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7 d-flex flex-wrap gap-2 justify-content-md-end">
                            @php $currentType = request('type', 'All'); @endphp
                            @foreach (['All', 'Full-time', 'Internship', 'Remote'] as $type)
                                <a href="{{ $type == 'All' ? url()->current() : url()->current() . '?type=' . $type }}"
                                    class="btn filter-pill {{ $currentType == $type ? 'active' : '' }}">
                                    {{ $type }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse($jobs as $job)
                <div class="col-xl-4 col-md-6">
                    <div class="card job-card border-0 h-100 transition shadow-hover">
                        <div class="card-body p-4 position-relative">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <div
                                    class="icon-box {{ $job->job_type == 'Internship' ? 'bg-soft-success text-success' : 'bg-soft-primary text-primary' }}">
                                    <i
                                        class="fas {{ $job->job_type == 'Internship' ? 'fa-laptop-code' : 'fa-building' }}"></i>
                                </div>
                                <span
                                    class="badge-custom {{ $job->job_type == 'Internship' ? 'type-intern' : 'type-full' }}">
                                    {{ $job->job_type }}
                                </span>
                            </div>

                            <h5 class="fw-bold text-dark mb-1 h-title">{{ $job->title }}</h5>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold small me-2">{{ $job->company_name }}</span>
                                <span class="text-muted small"><i
                                        class="fas fa-map-marker-alt me-1"></i>{{ $job->location }}</span>
                            </div>

                            <div class="category-tag mb-4">
                                <i class="fas fa-tag me-1 text-muted"></i> {{ $job->category_name }}
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-auto border-top pt-3">
                                <div class="salary-text">
                                    <span
                                        class="text-dark fw-bold h5 mb-0">{{ $job->salary_range ?? 'Competitive' }}</span>
                                    <small class="text-muted d-block" style="font-size: 10px;">ESTIMATED SALARY</small>
                                </div>
                                <a href="{{ route('alumni_std.view_jobs', $job->job_id) }}"
                                    class="btn btn-apply text-white rounded-pill px-6 shadow-sm">
                                    View Details
                                </a>

                                <!-- {{-- <button onclick="openApplyModal('{{ $job->job_id }}', '{{ $job->title }}')"
                                    class="btn btn-apply text-white rounded-pill px-4 shadow-sm">
                                    view job
                                </button> --}} -->
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state">
                        <div class="empty-icon mb-3"><i class="fas fa-search fa-4x text-light"></i></div>
                        <h4 class="text-muted">No Opportunities Found</h4>
                        <p class="text-muted">Try adjusting your filters or search terms.</p>
                        <a href="{{ url()->current() }}" class="btn btn-primary rounded-pill px-4">Clear All Filters</a>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="mt-5 d-flex justify-content-center custom-pagination">
            {{ $jobs->appends(request()->query())->onEachSide(1)->links() }}
        </div>
    </div>

@endsection
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
        --soft-primary: #eff6ff;
        --soft-success: #f0fdf4;
    }

    .text-gradient {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Card Styling */
    .job-card {
        background: #ffffff;
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid #f1f5f9;
    }

    .job-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08) !important;
        border-color: #3b82f6;
    }

    .h-title {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Icon Box */
    .icon-box {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        font-size: 1.2rem;
    }

    .bg-soft-primary {
        background-color: var(--soft-primary);
    }

    .bg-soft-success {
        background-color: var(--soft-success);
    }

    /* Custom Badges */
    .badge-custom {
        font-size: 0.75rem;
        font-weight: 700;
        padding: 6px 16px;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .type-intern {
        background: #dcfce7;
        color: #15803d;
    }

    .type-full {
        background: #dbeafe;
        color: #1e40af;
    }

    /* Search & Filters */
    .filter-wrapper {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.9);
    }

    .search-pill {
        background: #f8fafc;
        border: 1px solid #e2e8f0 !important;
    }

    .filter-pill {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 50px;
        padding: 8px 22px;
        font-weight: 600;
        color: #64748b;
        transition: all 0.3s;
        text-decoration: none;
    }

    .filter-pill:hover,
    .filter-pill.active {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }

    /* Buttons */
    .btn-apply {
        background: var(--primary-gradient);
        color: white;
        border: none;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-apply:hover {
        transform: scale(1.05);
        color: white;
        box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
    }

    /* Category Tag */
    .category-tag {
        font-size: 0.85rem;
        color: #64748b;
        font-weight: 500;
    }

    /* Pagination Styling */
    .pagination .page-item.active .page-link {
        background: var(--primary-gradient);
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
    }

    /* Pagination Arrow Size & Alignment Fix */
    .pagination svg {
        width: 20px !important;
        /* Size chota karne ke liye */
        height: 20px !important;
        vertical-align: middle;
    }

    /* Next aur Previous ke darmiyan spacing */
    .pagination .page-item {
        margin: 0 4px;
    }

    /* Page Link override taake arrows center hon */
    .page-link {
        display: flex !important;
        align-items: center;
        justify-content: center;
        padding: 0 !important;
        width: 40px !important;
        height: 40px !important;
    }

    /* Arrows wale icons agar font-awesome hain */
    .page-link i {
        font-size: 14px !important;
    }

    /* Extra Large Arrow container fix */
    nav[role="navigation"] div:first-child {
        display: none !important;
        /* Laravel ke default text "Showing 1 to 10..." ko hide karne ke liye */
    }
</style>
