@extends('sbadmin/master')
@section('title', 'petugasTU')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Petugas TU</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{url('admin/petugasTU/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" rel="noopener noreferrer"><i --}}
                    {{-- class="fas fa-plus fa-sm text-white-50"></i> </a> --}}
                    <button type="button" href="{{ url('admin/petugasTU')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Petugas TU</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugastu as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->namaTU}}</td>
                                    <td>{{$row->jk}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->telp}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/petugasTU/edit/'.$row->idTU)}}"><i class="fa fa-edit"></i></a>

                                        <form method="POST" class="d-inline"
                                            action="{{url('admin/petugasTU/destroy/'.$row->idTU)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Button trigger modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ action ('PetugasTUController@store')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ method_field('POST') }}
                                    {{ @csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaTU">Petugas TU</label>
                                                <input type="text" class="form-control" id="namaTU" name="namaTU" required>
                                                @error('namaTU')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" id="jk" required>
                                                    <option>--Pilihan--</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                                                @error('alamat')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telp">HP</label>
                                                <input type="text" class="form-control" id="telp" name="telp" required>
                                                @error('telp')
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
        </div>
        @include('sweetalert::alert')
    </div>
@endsection
