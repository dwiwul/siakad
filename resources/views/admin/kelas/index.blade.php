@extends('sbadmin/master')
@section('title', 'kelas')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">KELAS</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{ url('admin/kelas/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a> --}}
                <button type="button" href="{{ url('admin/kelas')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->namaKelas}}</td>
                                    <td>
                                        {{-- <a class="btn btn-outline-warning" href="{{url('admin/kelas/edit/'.$row->idKelas)}}" >
                                            <i class="fa fa-edit"></i></a> --}}
                                        <button type="button" href="{{ url('admin/kelas/edit/'.$row->idKelas)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal-{{$row->idKelas}}">
                                                <i class="fas fa-edit"></i></button>
                                        <form method="POST" class="d-inline"
                                            action="{{url('admin/kelas/destroy/'.$row->idKelas)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- Modal Tambah Data --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action ('KelasController@store')}}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                {{ method_field('POST') }}
                                                {{ @csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="namaKelas">Nama Kelas</label>
                                                            <input type="text" class="form-control" id="namaKelas" name="namaKelas" required>
                                                            @error('namaKelas')
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
                        {{-- Modal Edit Data --}}
                        @foreach ($kelas as $row)
                        <div class="modal fade" id="editModal-{{$row->idKelas}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal">Ubah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{-- url('admin/siswa/.$idSiswa --}}
                                    <form action="{{ url('admin/kelas/'.$row->idKelas)}}" method="post" id="editModal" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        {{ @csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="namaKelas">Nama Kelas</label>
                                                            <input type="text" id="namaKelas" name="namaKelas" class="form-control @error('namaKelas') is-invalid @enderror select2bs4" value="{{$row->namaKelas}}">
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

