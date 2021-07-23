@extends('sbadmin/master')
@section('title', 'pembayaran')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">pembayaran</h1>
        <div class="card-body">
             <form action="{{url('admin/pembayaran')}}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idSemester">Tahun</label>
                        <select name="idSemester" class="form-control">
                            @foreach($semester as $row)
                                <option value="{{$row ->idSemester}}">{{$row->tahunAjaran}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idKelas">Nama Kelas</label>
                        <select name="idKelas" class="form-control">
                            @foreach($kelas as $row)
                                <option value="{{$row ->idKelas}}">{{$row->namaKelas}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idSiswa">Nama Siswa</label>
                        <select name="idSiswa" class="form-control">
                            @foreach($siswa as $row)
                                <option value="{{$row ->idSiswa}}">{{$row->namaSiswa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input type="date" class="form-control" id="tgl" name="tgl">
                        @error('tgl')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idBayar">Jenis Bayar</label>
                        <select name="idBayar" class="form-control">
                            @foreach($jenisbayar as $row)
                                <option value="{{$row ->idBayar}}">{{$row->iuran}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jumlahBayar">Jumlah Bayar</label>
                        <input type="text" class="form-control" id="jumlahBayar" name="jumlahBayar">
                        @error('jumlahBayar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{url('admin/pembayaran/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


