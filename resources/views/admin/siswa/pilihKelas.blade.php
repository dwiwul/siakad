@extends('sbadmin/master')
@section('title', 'pilih kelas')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">PILIH KELAS</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export</a> --}}
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            @foreach($kelas as $row)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$row->namaKelas}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                <a href="{{url('admin/siswa/index/'.$row->idKelas)}}">Pilih</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->

            <!-- Pie Chart -->
        </div>

        <!-- Content Row -->

    </div>
@endsection
