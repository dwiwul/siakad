@extends('sbadmin/kepsek_master')
@section('title', 'petugasTU')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Petugas TU</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{url('admin/petugasTU/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-plus fa-sm text-white-50"></i> </a>
                    <button type="button" href="{{ url('admin/petugasTU')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
                        <button type="button" href="{{ url('importTU')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-download fa-sm text-white-50"></i> Import Data</button>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="frm_import" id="frm_import" class="form-horizontal" action="{{ url ('importTU')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ method_field('PUT') }}
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Button trigger modal -->
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url ('admin/petugasTU')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ method_field('POST') }}
                                    {{ @csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaTU">Petugas TU</label>
                                                <input type="text" class="form-control" id="namaTU" name="namaTU">
                                                @error('namaTU')
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
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                                @error('alamat')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telp">HP</label>
                                                <input type="text" class="form-control" id="telp" name="telp">
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
            </div> --}}
        </div>
        @include('sweetalert::alert')
    </div>
@endsection
