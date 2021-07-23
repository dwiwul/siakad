@extends('sbadmin/master')
@section('title', 'Jadwal')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/jadwal/')}}" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" id="id" name="id" value="{{$id}}">
                        <label for="hari">Hari</label>
                            <select class="form-control" name="hari" id="hari">
                                <option>--Pilihan--</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum`at">Jum`at</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                </div>
                    <div class="form-group">
                        <label for="idMapel">Mapel</label>
                        <select name="idMapel" class="form-control">
                            @foreach($mapel as $row)
                                <option value="{{$row -> idMapel}}">{{$row->namaMapel}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idPegawai">Pegawai</label>
                        <select  name="idPegawai" class="form-control">
                            @foreach($pegawai as $row)
                                <option value="{{ $row->idPegawai }}">{{ $row->namaPegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="idKelas">Kelas</label>
                        <select id="idKelas" name="idKelas" class="form-control">
                            @foreach($kelas as $row)
                                <option value="{{ $row->idKelas }}">{{ $row->namaKelas }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="jamMulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jamMulai" name="jamMulai" required>
                    </div>
                    <div class="form-group">
                        <label for="jamSelesai">Jam Selesai</label>
                        <input type="time" class="form-control" id="jamSelesai" name="jamSelesai" required>
                    </div>
            </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{url('admin/jadwal/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection

