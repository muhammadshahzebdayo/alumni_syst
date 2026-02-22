@extends('layouts.app')

@section('content')
    <style>
        /* 1. Main Background and Container */
        .content {
            background: #f0f2f5;
            min-height: 100vh;
            padding-top: 20px;
        }

        /* 2. Super Premium Card Design */
        .alumni-card {
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.4s ease;
        }

        /* 3. Gradient Side Profile Header */
        .profile-sidebar {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .avatar-circle {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border: 4px solid rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* 4. Modern Input Fields */
        .input-wrapper {
            margin-bottom: 20px;
            position: relative;
        }

        .input-wrapper label {
            font-weight: 700;
            color: #4e5e7a;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-left: 5px;
        }

        .premium-input {
            border: 2px solid #e3e6f0;
            border-radius: 12px;
            padding: 12px 15px;
            background-color: #f8f9fc;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .premium-input:focus {
            border-color: #4e73df;
            background: #fff;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.1);
            outline: none;
        }

        /* Locked/View Only Style */
        .locked-input {
            background-color: #eaecf4 !important;
            border: 2px solid #d1d3e2 !important;
            color: #858796 !important;
            cursor: not-allowed;
        }

        /* 5. Custom Select */
        .custom-dropdown {
            background-color: #f8f9fc;
            border: 2px solid #e3e6f0;
            border-radius: 12px;
            height: 50px !important;
        }

        /* 6. Glowing Action Buttons */
        .btn-save {
            background: #4e73df;
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            box-shadow: 0 10px 20px rgba(78, 115, 223, 0.3);
            transition: all 0.3s;
        }

        .btn-save:hover {
            background: #224abe;
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(78, 115, 223, 0.4);
            color: white;
        }

        .btn-cancel {
            color: #858796;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-cancel:hover {
            color: #4e73df;
        }

        /* Animated entry */
        .fade-in-custom {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <div class="content mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 fade-in-custom">
                    <div class="card alumni-card">
                        <div class="row no-gutters">

                            <div class="col-md-4 profile-sidebar">
                                <div class="avatar-circle">
                                    {{ substr($alumni->first_name, 0, 1) }}
                                </div>
                                <h3 class="font-weight-bold">{{ $alumni->first_name }}</h3>
                                <p class="badge badge-light px-3 py-2" style="border-radius: 50px; color: #4e73df;">
                                    Alumni Member
                                </p>
                                <div class="mt-4 small opacity-75">
                                    <i class="fa fa-clock-o"></i> Last updated:<br>
                                    {{ $alumni->updated_at ?? 'Never' }}
                                </div>
                            </div>

                            <div class="col-md-8 p-5">
                                <h4 class="text-dark font-weight-bold mb-4">Edit Profile Settings</h4>

                                <form action="{{ url('/alumni-admin/update/' . $alumni->alumni_id) }}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <div class="row">
                                        <div class="col-md-6 input-wrapper">
                                            <label><i class="fa fa-lock mr-1 text-muted"></i> First Name</label>
                                            <input type="text" class="form-control premium-input locked-input"
                                                value="{{ $alumni->first_name }}" disabled>
                                        </div>
                                        <div class="col-md-6 input-wrapper">
                                            <label><i class="fa fa-lock mr-1 text-muted"></i> Last Name</label>
                                            <input type="text" class="form-control premium-input locked-input"
                                                value="{{ $alumni->last_name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="input-wrapper mt-3">
                                        <label><i class="fa fa-envelope-o mr-1"></i> Email Address</label>
                                        <input type="email" name="email" class="form-control premium-input"
                                            value="{{ $alumni->email }}" required>
                                    </div>

                                    <div class="input-wrapper mt-3">
                                        <label><i class="fa fa-key mr-1 text-primary"></i> Update Password</label>
                                        <input type="password" name="password" class="form-control premium-input"
                                            placeholder="provide pass or leave empty to keep previous pass"
                                            autocomplete="new-password">
                                        <small class="text-info"><i class="fa fa-info-circle"></i> .</small>
                                    </div>

                                    <div class="input-wrapper mt-3">
                                        <label><i class="fa fa-university mr-1"></i> Department</label>
                                        <select name="department_id" class="form-control premium-input custom-dropdown"
                                            required>
                                            @foreach (DB::table('departments')->get() as $dept)
                                                <option value="{{ $dept->department_id }}"
                                                    {{ $alumni->department_id == $dept->department_id ? 'selected' : '' }}>
                                                    {{ $dept->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-5">
                                        <a href="{{ url('alumni-admin/tables-data') }}" class="btn-cancel">
                                            <i class="fa fa-chevron-left"></i> Cancel Changes
                                        </a>
                                        <button type="submit" class="btn btn-save">
                                            <i class="fa fa-paper-plane ml-2"></i> Update
                                            Profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
