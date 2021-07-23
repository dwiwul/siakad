@extends('sbadmin/kepsek_master')
@section('title', 'pegawai')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Pegawai</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{url('kepsek/pegawai/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" rel="noopener noreferrer"><i --}}
                    {{-- class="fas fa-plus fa-sm text-white-50"></i> </a> --}}
                    <button type="button" href="{{ url('admin/pegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#create">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button>
                {{-- <a href="{{url('kepsek/pegawai/cetak-data-pegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-print fa-sm text-white-50"></i> Cetak PDF</a> --}}
                {{-- <a href="{{ url('exportPegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success"><i
                    class="fas fa-upload fa-sm text-white-50"></i> Export Excel</a> --}}
                <button type="button" href="{{ url('importPegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-download fa-sm text-white-50"></i> Import Data</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telp/HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nip}}</td>
                                    <td>{{$row->namaPegawai}}</td>
                                    <td>{{$row->jk}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->telp}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>
                                        <a href="{{url('/kepsek/pegawai/show/'.$row->idPegawai)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <a class="btn btn-outline-warning" href="{{url('kepsek/pegawai/edit/'.$row->idPegawai)}}"><i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" action="{{url('kepsek/pegawai/destroy/'.$row->idPegawai)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                    {{-- <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?') Alert::question('Question Title', 'Question Message');"
                                        action="{{url('kepsek/pegawai/destroy/'.$row->idPegawai)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Button trigger modal -->


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
                        <form name="frm_import" id="frm_import" class="form-horizontal" action="{{ url ('importPegawai')}}" method="post" enctype="multipart/form-data">
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

            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="create">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ action ('PegawaiController@store')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ method_field('POST') }}
                                    {{ @csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nip">NIP</label>
                                                <input type="text" class="form-control" id="nip" name="nip" required>
                                                @error('nip')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaPegawai">Nama Pegawai</label>
                                                <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" required>
                                                @error('namaPegawai')
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
                                                <label for="tmpLahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tmpLahir" name="tmpLahir" required>
                                                @error('tmpLahir')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tglLahir">Tanggal</label>
                                                <input type="date" class="form-control" id="tglLahir" name="tglLahir" required>
                                                @error('tglLahir')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
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
                                                <label for="telp">Telp/HP</label>
                                                <input type="text" class="form-control" id="telp" name="telp" required>
                                                @error('telp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <input type="text" class="form-control" id="status" name="status" required>
                                                @error('status')
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

