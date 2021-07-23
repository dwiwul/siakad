@extends('sbadmin/kepsek_master')
@section('title', 'pegawai')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
    </div>
    <div class="card-body">
        <form action="{{url('kepsek/pegawai')}}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip">
                            @error('nip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaPegawai">Nama Pegawai</label>
                            <input type="text" class="form-control" id="namaPegawai" name="namaPegawai">
                            @error('namaPegawai')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-control" name="jk" id="jk">
                                <option>--Pilihan--</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tmpLahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tmpLahir" name="tmpLahir">
                            @error('tmpLahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tglLahir">Tanggal</label>
                            <input type="date" class="form-control" id="tglLahir" name="tglLahir">
                            @error('tglLahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            @error('alamat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telp">Telp/HP</label>
                            <input type="text" class="form-control" id="telp" name="telp">
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status">
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{url('kepsek/pegawai/index')}}" class="btn btn-secondary ">Kembali</a>

            </div>
        </form>
    </div>
</div>
@endsection
