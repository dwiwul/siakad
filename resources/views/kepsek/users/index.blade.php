@extends('sbadmin/kepsek_master')
@section('title', 'users')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">DATA USER</h1>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{url('kepsek/pegawai/cetak-data-pegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-print fa-sm text-white-50"></i> Cetak PDF</a>
                <a href="{{ url('exportPegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success"><i
                    class="fas fa-upload fa-sm text-white-50"></i> Export Excel</a> --}}
                    {{-- <a href="{{url('kepsek/users/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" rel="noopener noreferrer"><i
                        class="fas fa-plus fa-sm text-white-50"></i></a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Level User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->level}}</td>
                                    <td><a class="btn btn-outline-warning" href="{{url('kepsek/users/edit/'.$row->idUsers)}}"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
