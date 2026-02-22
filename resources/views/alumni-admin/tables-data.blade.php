@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">

    <style>
        .content {
            background: #f8fafc;
            min-height: 100vh;
            padding: 30px 20px;
            font-family: 'Poppins', sans-serif;
        }

        /* Premium Card Design */
        .custom-card {
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 20px;
        }

        .card-title {
            color: #1e293b;
            font-weight: 700;
            margin: 0;
            font-size: 18px;
        }

        /* Table Headers */
        .table thead th {
            background-color: #f8fafc;
            color: #475569;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #edf2f7;
            padding: 15px;
        }

        .table tbody td {
            vertical-align: middle;
            padding: 15px;
            color: #334155;
            font-size: 14px;
        }

        /* User Info styling */
        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: #4338ca;
            color: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 12px;
            font-size: 15px;
            box-shadow: 0 4px 6px rgba(67, 56, 202, 0.2);
        }

        /* Action Button styling */
        .btn-action {
            background: #ffffff;
            color: #4338ca;
            border: 1.5px solid #e0e7ff;
            border-radius: 8px;
            font-weight: 600;
            padding: 6px 14px;
            transition: 0.2s;
        }

        .btn-action:hover {
            background: #4338ca;
            color: #ffffff;
            transform: translateY(-1px);
        }

        /* DataTables Custom Styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4338ca !important;
            border-color: #4338ca !important;
            color: white !important;
            border-radius: 6px;
        }

        .dt-buttons .btn {
            background: #f1f5f9 !important;
            border: 1px solid #e2e8f0 !important;
            color: #475569 !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            border-radius: 6px !important;
            margin-right: 5px !important;
            padding: 5px 15px;
        }
    </style>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong class="card-title">
                                <i class="fa fa-users mr-2 text-primary"></i> Alumni Management
                            </strong>
                        </div>

                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table id="alumniTable" class="table table-hover mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Alumni Member</th>
                                            <th>Graduation</th>
                                            <th>Department</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumni as $row)
                                            <tr>
                                                <td>
                                                    <div class="user-info">
                                                        <div class="user-avatar">
                                                            {{ strtoupper(substr($row->first_name, 0, 1)) }}
                                                        </div>
                                                        <div>
                                                            <span
                                                                class="font-weight-bold d-block text-dark">{{ $row->first_name }}
                                                                {{ $row->last_name }}</span>
                                                            <small class="text-muted">ID: #{{ $row->user_id }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <i class="fa fa-calendar-o text-muted mr-1"></i>
                                                    {{ $row->graduation_year ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary small font-weight-bold">{{ $row->department_name ?? 'Not Updated' }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('/alumni-admin/edit-alumni', $row->user_id) }}"
                                                        class="btn btn-sm btn-action shadow-sm">
                                                        <i class="fa fa-edit mr-1"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#alumniTable').DataTable({
                "pageLength": 10, // 1. Ek page par 10 rows
                "ordering": true, // 2. Table sortable hai
                "responsive": true,
                "dom": '<"d-flex justify-content-between align-items-center mb-3"Bf>rt<"d-flex justify-content-between align-items-center mt-3"ip>', // Positioning
                "buttons": [ // 3. Exportable formats
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel-o"></i> Excel',
                        className: 'btn btn !filter-btn !filter-btn-excel !filter-btn-excel-hover'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        className: 'btn !filter-btn !filter-btn-pdf !filter-btn-pdf-hover'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> Print',
                        className: 'btn !filter-btn !filter-btn-print !filter-btn-print-hover'
                    }
                ],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search alumni...",
                    "paginate": {
                        "previous": "<i class='fa fa-angle-left'></i>",
                        "next": "<i class='fa fa-angle-right'></i>"
                    }
                }
            });
        });
    </script>
@endsection
