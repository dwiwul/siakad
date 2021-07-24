@extends('sbadmin/guru_master')
@section('title', 'siswa')

@section('content')
{{session('sukses')}}
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">DATA SISWA</h3>
				{{-- <h5>{{$semester_aktif}}</h5> --}}
				{{-- <h5>{{$id}}</h5> --}}

				{{-- <div>
				<a href="{{url('admin/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
				</div> --}}
				<ul class="nav nav-pills ml-auto p-2">

            </div>
            {{-- <div class="card-header py-3">
                <a href="{{url('guru/cetak-siswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</a>
                    <a href="{{url('guru/cetak-siswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Cetak Excel</a>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    {{-- @dump($data) --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kelas</th>
                                {{-- <th>NISN</th> --}}
                                <th>Nama Siswa</th>
                                {{-- <th>Alamat</th> --}}
                                <th>Jenis Kelamin</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Telp</th>
                                {{-- <th>Nama Ortu</th> --}}
                                {{-- <th>Status</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->semester->tahunAjaran }}</td>
                                    <td>{{$row->kelas->namaKelas }}</td>
                                    {{-- <td>{{$row->nis}}</td> --}}
                                    <td>{{$row->namaSiswa}}</td>
                                    {{-- <td>{{$row->alamat}}</td> --}}
                                    <td>{{$row->jk}}</td>
                                    <td>{{$row->tmpLahir}},{{$row->tglLahir}} </td>
                                    <td>{{$row->telp}}</td>
                                    {{-- <td>{{$row->namaOrtu}}</td> --}}
                                    {{-- <td>{{$row->status}}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
