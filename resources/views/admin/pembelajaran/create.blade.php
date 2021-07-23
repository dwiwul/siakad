@extends('sbadmin/master')
@section('title', 'Pembelajaran')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Pengajar</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/pembelajaran')}}" method="PATCH">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idSemester">Mulai</label>
                    <select id="idSemester" name="idSemester" class="form-control @error('idSemester') is-invalid @enderror select2bs4">
                        <option>-- keterangan --</option>
                        @foreach($semester as $data)
                            <option value="{{ $data->idSemester }}">{{ $data->tglMulai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idSemester">Selesai</label>
                    <select id="idSemester" name="idSemester" class="form-control @error('idSemester') is-invalid @enderror select2bs4">
                        <option>-- keterangan --</option>
                        @foreach($semester as $data)
                            <option value="{{ $data->idSemester }}">{{ $data->tglSelesai }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="idPegawai">Guru Pengampu</label>
                    <select id="idPegawai" name="idPegawai" class="form-control @error('idPegawai') is-invalid @enderror select2bs4">
                        <option>-- Guru Pengampu --</option>
                        @foreach($pegawai as $data)
                            <option value="{{ $data->idPegawai }}">{{ $data->namaPegawai }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="idMapel">Mata Pelajaran</label>
                    <select id="idMapel" name="idMapel" class="form-control @error('idMapel') is-invalid @enderror select2bs4">
                        <option>-- Mapel --</option>
                        @foreach($mapel as $data)
                            <option value="{{ $data->idMapel }}">{{ $data->namaMapel }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="idKelas">Kelas</label>
                    <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">
                        <option>-- Nama Kelas --</option>
                        @foreach($kelas as $data)
                            <option value="{{ $data->idKelas }}">{{ $data->namaKelas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{url('admin/pembelajaran/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection

