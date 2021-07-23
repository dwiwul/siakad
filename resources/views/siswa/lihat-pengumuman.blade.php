@extends('sbadmin/siswa_master')
@section('title', 'List Info')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengumuman</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            @foreach ($info as $item)
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ url('/siswa/lihat-pengumuman/'.$item->idInfo) }}">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ $item->tgl }}</div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->pengumuman }}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
