@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')
{{session('sukses')}}
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Kelas Siswa</h3>
                <div class="card-header py-3">
                    <a href="{{url('admin/cetak-tanggalsiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                        class="fas fa-print fa-sm text-white-50"></i> Cetak Pertanggal</a>
                </div>
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
                                <th>Tahun</th>
                                <th>Siswa</th>
                                <th>Kelas</th>
                                <th>NISN</th>
                                <th>Alamat</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>telp</th>
                                <th>Nama Orang Tua</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->semester->tahunAjaran }}</td>
                                    <td>{{$row->namaSiswa }}</td>
                                    <td>{{$row->kelas->namaKelas }}</td>
                                    <td>{{$row->nis }}</td>
                                    <td>{{$row->alamat }}</td>
                                    <td>{{$row->tmpLahir }},{{$row->tglLahir }}</td>
                                    <td>{{$row->telp }}</td>
                                    <td>{{$row->namaOrtu}}</td>
                                    <td>{{$row->status }}</td>
                                    <td>
                                        <a href="{{url('/admin/histori/detail-histori/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <a class="btn btn-outline-warning" href="{{url('/admin/histori/edit-histori/'.$row->idSiswa)}}"><i class="fa fa-edit"></i></a>

                                        <form action="{{ url('admin/siswa/destroy', $row->idSiswa)}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
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
