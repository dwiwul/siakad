@extends('sbadmin/guru_master')
@section('title', 'List Jadwal')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jadwal Hari Ini</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ url('/absen/list') }}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Bahasa Indonesia</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <h4>7B</h4>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">07.00 - 09.00</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Bahasa Indonesia</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h4>7B</h4>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">07.00 - 09.00</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Bahasa Indonesia</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h4>7B</h4>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">07.00 - 09.00</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Bahasa Indonesia</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h4>7B</h4>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">07.00 - 09.00</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
