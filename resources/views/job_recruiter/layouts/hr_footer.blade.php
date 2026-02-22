<div class="container-fluid pt-4 px-4 pb-4">
    <div class="footer-glass rounded-4 p-4 border-0">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
                <span class="text-muted small">&copy; {{ date('Y') }} </span>
                <a href="#" class="fw-bold text-primary text-decoration-none small">GM Software Solutions</a>
                <span class="text-muted small">. All rights reserved.</span>
            </div>

            <div class="col-12 col-md-6 text-center text-md-end">
                <div class="d-inline-flex align-items-center">
                    <span class="text-muted small me-3 d-none d-sm-inline">Professional Recruitment Portal</span>
                    <div class="footer-dot me-3"></div>
                    <span class="text-muted small">Designed with <i class="fa fa-heart text-danger mx-1"></i> by
                        <span class="text-dark fw-bold">GM Team</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Footer Styling */
    .footer-glass {
        background: #ffffff;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.02);
        transition: 0.3s;
    }

    /* Subtle Hover effect */
    .footer-glass:hover {
        border-color: #cbd5e1 !important;
    }

    /* Decorative Dot */
    .footer-dot {
        width: 4px;
        height: 4px;
        background: #cbd5e1;
        border-radius: 50%;
    }

    /* Link transitions */
    .footer-glass a {
        transition: color 0.2s ease-in-out;
    }

    .footer-glass a:hover {
        color: #1e40af !important;
        /* Darker blue on hover */
    }

    /* Small adjustments for mobile */
    @media (max-width: 576px) {
        .footer-glass {
            padding: 1.5rem !important;
        }
    }
</style>
<!-- {{-- <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">GM Software Solutions</a>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                Designed by GM Software Solutions
            </div>
        </div>
    </div>
</div> --}} -->
