@extends('layouts.app')

@section('content')
    <style>
        /* Modern Dashboard Styling */
        .content-wrapper {
            background: #f8f9fe;
            padding: 25px;
        }

        .welcome-banner {
            background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%);
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }

        .stat-card-modern {
            border: none;
            border-radius: 15px;
            background: #ffffff;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .stat-card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
        }

        .stat-card-modern::before {
            content: "";
            position: absolute;
            top: -10%;
            right: -10%;
            width: 100px;
            height: 100px;
            background: rgba(0, 0, 0, 0.03);
            border-radius: 50%;
            z-index: -1;
        }

        .icon-box-modern {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table-card-header {
            background: transparent;
            border-bottom: 1px solid #f1f3f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .badge-soft-success {
            background: #e6fffa;
            color: #38b2ac;
            border-radius: 30px;
            padding: 6px 12px;
        }

        .badge-soft-primary {
            background: #ebf4ff;
            color: #4299e1;
            border-radius: 30px;
            padding: 6px 12px;
        }

        .alumni-item {
            transition: 0.2s;
            padding: 12px;
            border-radius: 12px;
        }

        .alumni-item:hover {
            background: #f8fafc;
        }

        .btn-gradient {
            background: linear-gradient(45deg, #5e72e4, #825ee4);
            border: none;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-gradient:hover {
            transform: scale(1.05);
            color: white;
        }
    </style>

    <div class="content-wrapper">
        <div class="welcome-banner d-flex justify-content-between align-items-center">
            <div>
                <h2 class="font-weight-bold mb-1">Alumni Admin Console</h2>
                <p class="mb-0 opacity-8 text-white">Today requests are pending. =>
                </p>
            </div>
            <div class="d-none d-md-block">
                <button class="btn btn-light px-4 py-2 font-weight-bold" style="border-radius: 10px; color: #5e72e4;">
                    <b>{{ $stats['pending'] }}</b>
                </button>
            </div>
        </div>

        <div class="row">
            @php
                $cards = [
                    ['Alumni', $stats['alumni'], 'fa-graduation-cap', '#5e72e4', 'bg-soft-primary'],
                    ['Events', $stats['events'], 'fa-calendar-check-o', '#2dce89', 'bg-soft-success'],
                    ['Job Posts', $stats['jobs'], 'fa-briefcase', '#11cdef', 'bg-soft-info'],
                    ['Pending', $stats['pending'], 'fa-hourglass-start', '#f5365c', 'bg-soft-warning'],
                ];
            @endphp

            @foreach ($cards as $c)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stat-card-modern shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-uppercase text-muted small font-weight-bold mb-1">{{ $c[0] }}</p>
                                    <h3 class="font-weight-bold mb-0 text-dark">{{ $c[1] }}</h3>
                                </div>
                                <div class="icon-box-modern" style="background: {{ $c[3] }}; color: white;">
                                    <i class="fa {{ $c[2] }}"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress" style="height: 5px; border-radius: 10px;">
                                    <div class="progress-bar" style="width: 70%; background: {{ $c[3] }};"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-2">
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="table-card-header">
                        <h5 class="font-weight-bold mb-0 text-dark"><i class="fa fa-rocket mr-2 text-primary"></i> Upcoming
                            Activities</h5>
                        <a href="{{ url('/alumni-admin/post-events') }}" class="btn btn-sm btn-outline-primary px-3"
                            style="border-radius: 8px;">View
                            Detailed List</a>
                    </div>
                    <div class="table-responsive px-4 pb-4">
                        <table class="table align-middle border-0">
                            <thead class="small text-muted text-uppercase">
                                <tr>
                                    <th class="border-0">Event Detail</th>
                                    <th class="border-0">Scheduled Date</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestEvents as $event)
                                    <tr style="border-bottom: 1px solid #f8f9fe;">
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-soft-primary p-2 mr-3 rounded text-center"
                                                    style="width: 40px;">
                                                    <i class="fa fa-star text-primary"></i>
                                                </div>
                                                <div>
                                                    <span
                                                        class="d-block font-weight-bold text-dark">{{ $event->event_name }}</span>
                                                    <small
                                                        class="text-muted">{{ $event->location ?? 'University Hall' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span
                                                class="text-dark font-weight-bold">{{ date('d M, Y', strtotime($event->event_date)) }}</span>
                                        </td>
                                        <td><span class="badge-soft-success small font-weight-bold">Fixed </span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5">
                                            still any Event is not Scheduled
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h5 class="font-weight-bold text-dark">Recent Alumni</h5>
                    </div>
                    <div class="card-body px-4">
                        @foreach ($recentAlumni as $alumnus)
                            <div class="alumni-item d-flex align-items-center mb-3">
                                <div class="mr-3">
                                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center font-weight-bold"
                                        style="width: 45px; height: 45px; background: #9475e7; box-shadow: 0 4px 8px rgba(130, 94, 228, 0.3);">
                                        {{ substr($alumnus->first_name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 font-weight-bold text-dark small">{{ $alumnus->first_name }}
                                        {{ $alumnus->last_name }}</h6>
                                    <p class="text-muted mb-0" style="font-size: 11px;">{{ $alumnus->department_name }} |
                                        {{ $alumnus->batch }}</p>
                                </div>
                                <i class="fa fa-chevron-right text-light small"></i>
                            </div>
                        @endforeach
                        <button class="btn btn-block btn-gradient mt-3 py-2 shadow-sm">
                            <i class="fa fa-user-plus mr-2"></i><a href="{{ url('/alumni-admin/tables-data') }}"
                                class=" text-white"> Manage
                                All</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
