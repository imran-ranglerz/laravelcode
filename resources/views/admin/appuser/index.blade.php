@extends('admin.layouts.app')
@section('content')
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body style="background-color: aliceblue">
    <div class="container" >
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>All User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">User table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12">
                <table id="example" border="1" class="table table-bordered table-striped table-hover responsive nowrap" style="width:100%">
                    <thead>
                        <tr border="1">
                            <th>SR#</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>CNIC</th>
                            <th>PHONE</th>
                            <th>Date of Birth</th>
                            <th>UCADDRESS</th>
                            <th>NO OF VOTES</th>
                            <th>PASSWORD</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appusers as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <img height="60px" width="60px" src="images/{{ $user->image}}">

                                        <div class="">
                                            <p class="font-weight-bold mr-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td>{{$user->name}}</td>
                            <td >{{$user->email}}</td>
                            <td>{{$user->cnic}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->date_of_birth}}</td>
                            <td>{{$user->ucaddress}}</td>
                            <td>{{$user->number_of_votes}}</td>
                            <td>{{$user->password}}</td>
                            <td>
                                <a href="{{route('appuser',Hashids::encode($user->id))}}" class="btn btn-sm btn-clean btn-icon btn-icon-md float-left" title="REMOVE">
                                    <i class="fa fa-trash"></i>
                                  </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #f7f7f7;
        }

        .table {
            border-spacing: 0 0.85rem !important;
        }

        .table .dropdown {
            display: inline-block;
        }

        .table td,
        .table th {
            vertical-align: middle;
            margin-bottom: 10px;
            border: none;
        }

        .table thead tr,
        .table thead th {
            border: none;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: transparent;
        }

        .table td {
            background: #fff;
        }

        .table td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .table td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .avatar {
            width: 2.75rem;
            height: 2.75rem;
            line-height: 3rem;
            border-radius: 50%;
            display: inline-block;
            background: transparent;
            position: relative;
            text-align: center;
            color: #868e96;
            font-weight: 700;
            vertical-align: bottom;
            font-size: 1rem;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .avatar-sm {
            width: 2.5rem;
            height: 2.5rem;
            font-size: 0.83333rem;
            line-height: 1.5;
        }
        .email {
                line-height: 53px !important;
                 color: #878787;
               }
        .avatar-img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .avatar-blue {
            background-color: #c8d9f1;
            color: #467fcf;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
            top: 28px;
            left: 14px;
            border: none;
            box-shadow: none;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child,
        table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child {
            padding-left: 48px;
        }

        table.dataTable>tbody>tr.child ul.dtr-details {
            width: 100%;
        }

        table.dataTable>tbody>tr.child span.dtr-title {
            min-width: 50%;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr>td.child,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th.child,
        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty {
            padding: 0.75rem 1rem 0.125rem;
        }

        div.dataTables_wrapper div.dataTables_length label,
        div.dataTables_wrapper div.dataTables_filter label {
            margin-bottom: 0;
        }

        @media (max-width: 767px) {
            div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                -ms-flex-pack: center !important;
                justify-content: center !important;
                margin-top: 1rem;
            }
        }

        .btn-icon {
            background: #fff;
        }
        .form-control-sm{
            width: 70% !important;
        }

        .btn-icon .bx {
            font-size: 20px;
        }

        .btn .bx {
            vertical-align: middle;
            font-size: 20px;
        }

        .dropdown-menu {
            padding: 0.25rem 0;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
        }

        .badge {
            padding: 0.5em 0.75em;
        }

        .badge-success-alt {
            background-color: #d7f2c2;
            color: #7bd235;
        }

        .table a {
            color: #212529;
        }

        .table a:hover,
        .table a:focus {
            text-decoration: none;
        }

        table.dataTable {
            margin-top: 12px !important;
        }

        .icon>.bx {
            display: block;
            min-width: 1.5em;
            min-height: 1.5em;
            text-align: center;
            font-size: 1.0625rem;
        }

        .btn {
            font-size: 0.9375rem;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
        }

        .avatar-blue {
            background-color: #c8d9f1;
            color: #467fcf;
        }

        .avatar-pink {
            background-color: #fcd3e1;
            color: #f66d9b;
        }
    </style>

    <script>
        $(document).ready(function() {
            $("#example").DataTable({
                aaSorting: [],
                responsive: true,

                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    }
                ]
            });
            $(".dataTables_filter input")
                .attr("placeholder", "Search here...")
                .css({
                    width: "300px",
                    display: "inline-block"
                });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
@endsection