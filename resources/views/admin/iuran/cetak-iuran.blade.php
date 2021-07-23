@extends('sbadmin/master')
@section('title', 'iuran')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Cetak Data Iuran</h1>
        </div>
        <div class="card-body">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="tglawal">Tanggal Awal</label>
                <input type="date" class="form-control" id="tglawal" name="tglawal">
                @error('tglawal')
                    <small class="text-danger">{{ $message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tglakhir">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tglakhir" name="tglakhir">
                @error('tglakhir')
                    <small class="text-danger">{{ $message}}</small>
                @enderror
            </div>
        </div>

        <div class="input-group mb-3">
            <a href="" onclick="this.href='/admin/iuran/cetak-data-iuran/' + document.getElementById('tglawal').value +
            '/' +  document.getElementById('tglakhir').value" target="_blank"
            class="btn btn-primary col-md-12">Cetak Laporan Pertanggal<i class="fas fa-print"></i>
            </a>
        </div>
    </div>

@endsection















