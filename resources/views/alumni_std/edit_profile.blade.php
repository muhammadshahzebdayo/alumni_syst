@extends('alumni_std.layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="profile-header text-white p-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-gear fs-2 me-3"></i>
                            <div>
                                <h4 class="mb-0 fw-bold">Edit Alumni Profile</h4>
                                <small class="opacity-75">Keep your academic & career info updated</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">

                        {{-- PROFILE IMAGE --}}
                        <div class="text-center mb-4">
                            {{-- <img src="{{ asset('images/default-avatar.png') }}"
                                class="rounded-circle shadow-sm profile-avatar" alt="Profile"> --}}
                            <img src="{{ asset('images/default-avatar.png') }}" class="rounded-circle shadow-sm border" alt
                                alt="profile picture" width="120" height="120">
                            <h6 class="mt-2 fw-bold">
                                {{ $edit_profile->first_name }} {{ $edit_profile->last_name }}
                            </h6>
                            <span class="badge bg-light text-primary">
                                Alumni
                            </span>
                        </div>

                        <form method="POST" action="{{ route('alumni_std.update_profile') }}"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- ================= PERSONAL INFO ================= --}}
                            <div class="profile-section mb-4">
                                <h6 class="fw-bold text-primary mb-3">
                                    <i class="bi bi-person-fill me-1"></i>
                                    Personal Information
                                </h6>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ $edit_profile->first_name }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ $edit_profile->last_name }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            value="{{ $edit_profile->phone_number }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Male" {{ $edit_profile->gender == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ $edit_profile->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" rows="2" class="form-control">{{ $edit_profile->address }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- ================= ACADEMIC INFO ================= --}}
                            <div class="profile-section mb-4">
                                <h6 class="fw-bold text-primary mb-3">
                                    <i class="bi bi-mortarboard-fill me-1"></i>
                                    Academic Information
                                </h6>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Graduation Year</label>
                                        <input type="text" name="graduation_year" class="form-control"
                                            value="{{ $edit_profile->graduation_year }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Department</label>
                                        <select name="department_id" class="form-select">
                                            @foreach ($departments as $dept)
                                                <option value="{{ $dept->department_id }}"
                                                    {{ $dept->department_id == $edit_profile->department_id ? 'selected' : '' }}>
                                                    {{ $dept->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- ================= CAREER INFO ================= --}}
                            <div class="profile-section mb-4">
                                <h6 class="fw-bold text-primary mb-3">
                                    <i class="bi bi-briefcase-fill me-1"></i>
                                    Career Information
                                </h6>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Designation</label>
                                        <input type="text" name="designation" class="form-control"
                                            value="{{ $edit_profile->designation }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Company</label>
                                        <input type="text" name="company_name" class="form-control"
                                            value="{{ $edit_profile->company_name }}">
                                    </div>
                                </div>
                            </div>

                            {{-- ================= ACTIONS ================= --}}
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('alumni_std.profile') }}" class="btn btn-outline-secondary px-4">
                                    Cancel
                                </a>
                                <button class="btn btn-primary px-4">
                                    <i class="bi bi-save me-1"></i>
                                    Save Changes
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
