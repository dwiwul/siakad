@extends('sbadmin/master')
@section('title', 'kelas')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/siswa/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>tmp_lahir</th>
                                <th>tgl_lahir</th>
                                <th>Telp/HP</th>
                                <th>Nama OrangTua</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nis}}</td>
                                    <td>{{$row->namaSiswa}}</td>
                                    <td>{{$row->kelas->namaKelas}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->jk}}</td>
                                    <td>{{$row->tmpLahir}}</td>
                                    <td>{{$row->tglLahir}}</td>
                                    <td>{{$row->telp}}</td>
                                    <td>{{$row->namaOrtu}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}">
                                            <i class="fa fa-edit"></i></a>

                                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                        action="{{url('admin/siswa/destroy/'.$row->idSiswa)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

