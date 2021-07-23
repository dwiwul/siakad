@extends('sbadmin/master')
@section('title', 'info')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Pengumuman</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" href="{{ url('admin/info')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#create">
                    <i class="fas fa-plus fa-sm text-white-50"></i></button>
                {{-- <a href="{{ url('admin/info/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pengumuman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($info as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->tgl}}</td>
                                    <td>{{$item->pengumuman}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/info/edit/'.$item->idInfo)}}">
                                            <i class="fa fa-edit"></i></a>

                                        <form method="POST" class="d-inline"
                                            action="{{url('admin/info/destroy/'.$item->idInfo)}}">
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

            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="create">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ action ('InfoController@store')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{method_field('POST')}}
                                    {{ @csrf_field() }}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl">Tanggal</label>
                                            <input type="date" id="tgl" name="tgl" class="form-control @error('tgl') is-invalid @enderror">
                                        </div>

                                        <div class="form-group">
                                            <label for="pengumuman">Pengumuman</label>
                                            <input type="text" id="pengumuman" name="pengumuman" class="form-control @error('pengumuman') is-invalid @enderror">
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

        </div>

    </div>
@endsection

