@extends('sbadmin/guru_master')
@section('title', 'nilai')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit nilai</h1>

    <form action="{{ route('nilai.update', $nilai->idNilai)}}"method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idMapel">Mapel</label>
                    <select id="idMapel" name="idMapel" class="form-control @error('idMapel') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih mapel --</option>
                        @foreach($mapel as $data)
                            <option value="{{ $data->idNilai }}">{{ $data->namaMapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idPegawai">Guru</label>
                    <select id="idPegawai" name="idPegawai" class="form-control @error('idPegawai') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($pegawai as $data)
                            <option value="{{ $data->idPegawai }}">{{ $data->namaPegawai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idSiswa">Siswa</label>
                    <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Tahun --</option>
                        @foreach($siswa as $data)
                            <option value="{{ $data->idSiswa }}">{{ $data->namaSiswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nilaiHarian">UH</label>
                    <input type="text" value="{{$siswa->nilaiHarian}}" class="form-control" id="nilaiHarian" name="nilaiHarian">
                    @error('nilaiHarian')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilaiUts">UTS</label>
                    <input type="text" value="{{$siswa->nilaiUts}}" class="form-control" id="nilaiUts" name="nilaiUts">
                    @error('nilaiUts')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilaiUas">UAS</label>
                    <input type="text" value="{{$siswa->nilaiUas}}" class="form-control" id="nilaiUas" name="nilaiUas">
                    @error('nilaiUas')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/nilai" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
