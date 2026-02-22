@extends('layouts.app')

@section('content')
    <style>
        /* 1. Base Content & Background - Industry Slate */
        .content {
            background: #f8fafc; 
            min-height: 100vh;
            padding: 40px 20px;
            font-family: 'Poppins', sans-serif;
        }

        /* 2. Premium Admin Card */
        .premium-add-card {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.04), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
            max-width: 850px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }

        /* 3. Authority Top Border (Deep Indigo Gradient) */
        .premium-add-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #4338ca, #6366f1);
        }

        /* 4. Header Styling */
        .clean-header {
            padding: 45px 20px 15px;
            text-align: center;
            background: linear-gradient(to bottom, #fcfdff, #ffffff);
        }

        .clean-header h2 {
            font-weight: 700;
            color: #1e293b; /* Deep Navy Text */
            letter-spacing: -0.025em;
            margin-bottom: 8px;
        }

        .clean-header p {
            color: #64748b; /* Slate Gray */
            font-size: 14px;
        }

        /* 5. Form Wrapper */
        .form-wrapper {
            padding: 20px 50px 50px;
        }

        /* 6. Section Badge - Professional Indigo Tint */
        .step-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 12px;
            background: #eef2ff; /* Very light Indigo */
            color: #4338ca; /* Indigo Text */
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: 1px solid #e0e7ff;
        }

        /* 7. Input Fields - Clean Industry Style */
        .input-block {
            margin-bottom: 22px;
        }

        .input-block label {
            display: block;
            font-weight: 600;
            color: #334155;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .premium-field {
            width: 100%;
            height: 48px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 16px;
            background: #ffffff;
            transition: all 0.2s ease;
            font-size: 14px;
            color: #1e293b;
        }

        /* Focus State: Indigo Ring */
        .premium-field:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        /* 8. The "Admin" Action Button - Deep Indigo */
        .btn-submit-premium {
            background: #4338ca; 
            color: #ffffff;
            border: none;
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 4px 6px -1px rgba(67, 56, 202, 0.2);
        }

        .btn-submit-premium:hover {
            background: #3730a3;
            box-shadow: 0 10px 15px -3px rgba(67, 56, 202, 0.3);
            transform: translateY(-1px);
        }

        .discard-link {
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
        }

        .discard-link:hover {
            color: #1e293b;
            text-decoration: underline;
        }

        /* Animation */
        .fade-up {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="content">
        <div class="fade-up">
            <div class="card premium-add-card">
                <div class="clean-header">
                    <h2>Alumni Directory</h2>
                    <p>Administrative tool to onboard new community members.</p>
                </div>

                <div class="form-wrapper">
                    <form action="{{ url('/alumni-admin/save-alumni') }}" method="post">
                        @csrf

                        <span class="step-badge"><i class="fa fa-user mr-2"></i> Identity Details</span>
                        <div class="row">
                            <div class="col-md-6 input-block">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="premium-field" placeholder="John" required>
                            </div>
                            <div class="col-md-6 input-block">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="premium-field" placeholder="Doe" required>
                            </div>
                        </div>

                        <span class="step-badge"><i class="fa fa-lock mr-2"></i> Credentials</span>
                        <div class="row">
                            <div class="col-md-6 input-block">
                                <label>Official Email</label>
                                <input type="email" name="email" class="premium-field" placeholder="alumni@institution.edu" required>
                            </div>
                            <div class="col-md-6 input-block">
                                <label>System Password</label>
                                <input type="password" name="password" class="premium-field" placeholder="••••••••" required>
                            </div>
                        </div>

                        <span class="step-badge"><i class="fa fa-graduation-cap mr-2"></i> Academic Background</span>
                        <div class="row">
                            <div class="col-md-8 input-block">
                                <label>Department</label>
                                <select name="department_id" class="premium-field" required>
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach ($departments as $dept)
                                        <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 input-block">
                                <label>Passing Year</label>
                                <input type="number" name="graduation_year" class="premium-field" placeholder="2024" required>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn-submit-premium">
                                Save Profile to Database
                            </button>
                            <div class="mt-4">
                                <a href="{{ url()->previous() }}" class="discard-link">
                                    Cancel and exit
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection