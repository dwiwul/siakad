@extends('sbadmin/master')
@section('title', 'info')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Info</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/info')}}" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" id="tgl" name="tgl" class="form-control @error('tgl') is-invalid @enderror">
                </div>

                <div class="form-group">
                    <label for="pengumuman">Pengumuman</label>
                    <input type="text" id="pengumuman" name="pengumuman" class="form-control @error('pengumuman') is-invalid @enderror">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{url('admin/info/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection
