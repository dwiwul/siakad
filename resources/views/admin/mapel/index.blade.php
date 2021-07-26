@extends('sbadmin/master')
@section('title', 'mapel')

@section('content')
{{session('sukses')}}

        <!-- DataTales Example -->
<h1 class="h3 mb-4 text-gray-800">MAPEL</h1>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                {{-- <a href="{{url('admin/mapel')}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a> --}}
                <button type="button" href="{{ url('admin/mapel')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Guru Pengampu</th>
                                    <th>Nama Mapel</th>
                                    <th>Aksi</th>
                                </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($mapel as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->pegawai->namaPegawai}}</td>
                                <td>{{$row->namaMapel}}</td>
                                <td>
                                    {{-- <a class="btn btn-outline-warning" href="{{url('admin/mapel/edit/'.$row->idMapel)}}">
                                    <i class="fa fa-edit"></i></a> --}}
                                    <button type="button" href="{{ url('admin/mapel/edit/'.$row->idMapel)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal-{{$row->idMapel}}">
                                        <i class="fas fa-edit"></i></button>
                                    <form method="POST" class="d-inline" action="{{url('admin/mapel/destroy/'.$row->idMapel)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                </form>
                                    {{-- <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                        action="{{url('admin/mapel/destroy/'.$row->idMapel)}}">{{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method"><button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ action ('MapelController@store')}}" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            {{ method_field('POST') }}
                                            {{ @csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="idPegawai">Nama Pengampu</label>
                                                    <select name="idPegawai" class="form-control">
                                                        @foreach($pegawai as $row)
                                                            <option value="{{$row->idPegawai}}">{{$row->namaPegawai}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="namaMapel">Nama Mata Pelajaran</label>
                                                        <input type="text" class="form-control" id="namaMapel" name="namaMapel" required>
                                                        @error('namaMapel')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @foreach ($mapel as $row)
                    <div class="modal fade" id="editModal-{{$row->idMapel}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModal">Ubah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- url('admin/siswa/.$idSiswa --}}
                                <form action="{{ url('admin/mapel/'.$row->idMapel)}}" method="post" id="editModal" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                    {{ @csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="idPegawai">Guru Pengampu</label>
                                                        <select id="idPegawai" name="idPegawai" class="form-control @error('idPegawai') is-invalid @enderror select2bs4">
                                                            @foreach($pegawai as $data)
                                                                <option value="{{ $data->idPegawai }}">{{ $data->namaPegawai }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="namaMapel">Nama Mapel</label>
                                                        <input type="text" id="namaMapel" name="namaMapel" class="form-control @error('namaMapel') is-invalid @enderror select2bs4" value="{{$row->namaMapel}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

