@extends('sbadmin/master')
@section('title', 'jadwal')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Jadwal</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/jadwal/'.$id)}}" method="POST">
                @method('patch')
                @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idMapel">Mapel</label>
                    <select id="idMapel" name="idMapel" class="form-control">
                        @foreach($mapel as $data)
                            <option value="{{ $data->idMapel }}">{{ $data->namaMapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idPegawai">Pegawai</label>
                    <select id="idPegawai" name="idPegawai" class="form-control">
                        @foreach($pegawai as $data)
                            <option value="{{ $data->idPegawai }}">{{ $data->namaPegawai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hari">Hari</label>
                        <select class="form-control" name="hari" id="hari">
                            <option value="Senin" {{$jadwal->hari == 'Senin' ? 'selected' : ''}}>Senin</option>
                            <option value="Selasa" {{$jadwal->hari == 'Selasa' ? 'selected' : ''}}>Selasa</option>
                            <option value="Rabu" {{$jadwal->hari == 'Rabu' ? 'selected' : ''}}>Rabu</option>
                            <option value="Kamis" {{$jadwal->hari == 'Kamis' ? 'selected' : ''}}>Kamis</option>
                            <option value="Jum`at" {{$jadwal->hari == 'Jum`at' ? 'selected' : ''}}>Jum`at</option>
                            <option value="Jum`at" {{$jadwal->hari == 'Sabtu' ? 'selected' : ''}}>Sabtu</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="jamMulai">Jam Mulai</label>
                    <input type="time" class="form-control" id="jamMulai" name="jamMulai" value="{{$jadwal->jamMulai}}">
                </div>
                <div class="form-group">
                    <label for="jamSelesai">Jam Selesai</label>
                    <input type="time" class="form-control" id="jamSelesai" name="jamSelesai" value="{{$jadwal->jamSelesai}}">
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        {{-- <a href="{{url('admin/jadwal/show')}}" class="btn btn-secondary btn-sm">Kembali</a> --}}
    </form>
        </div>
    </div>
@endsection



