
@extends('sbadmin/kepsek_master')
@section('title', 'Dashboard Kepsek')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">BERANDA</h1>
        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Selamat Datang, {{ session('username') }}</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h3>Sistem Informasi Akademik MTs Roudlatul Ulum Parang</h3>
                <img src="{{ url('vendor/sbadmin/logo mts.png')}}">
            </div>
        </div>
    </div>
</div>

@endsection
