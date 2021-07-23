@extends('sbadmin/kepsek_master')
@section('title', 'Users')

@section('content')

<div class="card shadow mb-4">
    <h1 class="h3 mb-4 text-gray-800">TAMBAH USER</h1>
    <form action="{{url('kepsek/users')}}" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"
                        class="form-control @error('username') is-invalid @enderror" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" id="level" class="form-control" required="true" required>
                        <option value=''>Pilih Level</option>
                        <option value='Admin'>Admin</option>
                        <option value='Kepsek'>Kepala Sekolah</option>
                        <option value='Guru'>Guru</option>
                        <option value='Siswa'>Siswa</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idPegawai">Nama Pegawai</label>
                        <select id="idPegawai" name="idPegawai" class="form-control @error('idPegawai') is-invalid @enderror select2bs4" required>
                            <option>-- Pilih pegawai --</option>
                            @foreach($pegawai as $data)
                                <option value="{{ $data->idPegawai }}">{{ $data->namaPegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idSiswa">Nama Siswa</label>
                        <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4" required>
                            <option>-- Pilih Siswa --</option>
                            @foreach($siswa as $data)
                                <option value="{{ $data->idSiswa }}">{{ $data->namaSiswa}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idSiswa">Nama Siswa</label>
                        <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4" required>
                            <option>-- Pilih Siswa --</option>
                            @foreach($siswa as $data)
                                <option value="{{ $data->idSiswa }}">{{ $data->namaSiswa}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{('kepsek/users/index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</div>
@endsection
