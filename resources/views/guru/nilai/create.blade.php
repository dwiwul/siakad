@extends('sbadmin/guru_master')
@section('title', 'nilai')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Nilai</h1>

    <form action="/nilai" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idMapel">Mapel</label>
                    <select id="idMapel" name="idMapel" class="form-control @error('idMapel') is-invalid @enderror select2bs4">
                        <option>-- Pilih mapel--</option>
                        @foreach($mapel as $data)
                            {{-- <option value="{{ $data->idMapel }}">{{ $data->namaPegawai }}</option> --}}
                            <option value="{{ $data->idMapel }}">{{ $data->namaMapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idPegawai">Pegawai</label>
                    <select id="idPegawai" name="idPegawai" class="form-control @error('idPegawai') is-invalid @enderror select2bs4">
                        <option>-- Pilih Pegawai --</option>
                        @foreach($pegawai as $data)
                            {{-- <option value="{{ $data->idPegawai }}">{{ $data->namaPegawai }}</option> --}}
                            <option value="{{ $data->idPegawai }}">{{ $data->namaPegawai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idSiswa">Siswa</label>
                    <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                        <option>-- Pilih --</option>
                        @foreach($siswa as $data)
                            {{-- <option value="{{ $data->idSiswa }}">{{ $data->namaPegawai }}</option> --}}
                            <option value="{{ $data->idSiswa }}">{{ $data->namaSiswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nilaiHarian">UH</label>
                    <input type="text" class="form-control" id="nilaiHarian" name="nilaiHarian">
                    @error('nilaiHarian')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilaiUts">UTS</label>
                    <input type="text" class="form-control" id="nilaiUts" name="nilaiUts">
                    @error('nilaiUts')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilaiUas">UAS</label>
                    <input type="text" class="form-control" id="nilaiUas" name="nilaiUas">
                    @error('nilaiUas')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/nilai" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
