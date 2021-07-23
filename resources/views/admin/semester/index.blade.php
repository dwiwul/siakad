@extends('sbadmin/master')
@section('title', 'semester')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Tahun Ajaran</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{ url('admin/semester/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a> --}}
                <button type="button" href="{{ url('admin/semester')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Tgl Mulai s/d Selesai</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($semester as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->tahunAjaran}}</td>
                                    <td>{{$row->tglMulai}} s/d {{$row->tglSelesai}}</td>
                                    <td>{{$row->keterangan}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/semester/edit/'.$row->idSemester)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" class="d-inline"
                                            action="{{url('admin/semester/destroy/'.$row->idSemester)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
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
                                    <form action="{{ action ('SemesterController@store')}}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                {{ method_field('POST') }}
                                                {{ @csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tahunAjaran">Tahun Ajaran</label>
                                                            <input type="text" class="form-control" id="tahunAjaran" name="tahunAjaran" required>
                                                            @error('tahunAjaran')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tglMulai">Tgl Mulai</label>
                                                            <input type="date" class="form-control" id="tglMulai" name="tglMulai" required>
                                                            @error('tglMulai')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tglSelesai">Tgl Selesai</label>
                                                            <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" required>
                                                            @error('tglSelesai')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                                            @error('keterangan')
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

