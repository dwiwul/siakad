@extends('sbadmin/master')
@section('title', 'histori siswa')

@section('content')
{{session('sukses')}}
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">HISTORI SISWA</h3>
				{{-- <h5>{{$semester_aktif}}</h5> --}}
				{{-- <h5>{{$id}}</h5> --}}

				{{-- <div>
				<a href="{{url('admin/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
				</div> --}}
				<ul class="nav nav-pills ml-auto p-2">

            </div>
            <div class="card-header py-3">
                <a href="{{url('admin/cetak-histori')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</a>
                    <a href="{{url('admin/cetak-histori')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Cetak Excel</a>
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
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historisiswa as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->tahun}}</td>
                                    <td>{{$row->siswa->namaSiswa }}</td>
                                    <td>{{$row->kelas->namaKelas }}</td>
                                    <td>{{$row->semester->keterangan}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
