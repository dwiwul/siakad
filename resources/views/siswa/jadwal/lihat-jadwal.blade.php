@extends('sbadmin/siswa_master')
@section('title', 'jadwal')

@section('content')
{{session('sukses')}}
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">JADWAL</h3>
				{{-- <h5>{{$semester_aktif}}</h5> --}}
				{{-- <h5>{{$id}}</h5> --}}

				{{-- <div>
				<a href="{{url('admin/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
				</div> --}}
				<ul class="nav nav-pills ml-auto p-2">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- @dump($data) --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Guru</th>
                                <th>Hari</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->mapel->namaMapel }}</td>
                                    <td>{{$item->pegawai->namaPegawai }}</td>
                                    <td>{{$item->hari }}</td>
                                    <td>{{$item->jamMulai }}</td>
                                    <td>{{$item->jamSelesai }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
