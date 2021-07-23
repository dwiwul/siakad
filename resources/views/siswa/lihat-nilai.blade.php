@extends('sbadmin/siswa_master')
@section('title', 'nilai')

@section('content')
{{session('sukses')}}
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">NILAI</h3>
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
                                <th>Siswa</th>
                                <th>Tugas</th>
                                <th>UH</th>
                                <th>UTS</th>
                                <th>UAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->mapel->namaMapel }}</td>
                                    <td>{{$row->pegawai->namaPegawai }}</td>
                                    <td>{{$row->siswa->namaSiswa }}</td>
                                    <td>{{$row->nilaiTugas}}</td>
                                    <td>{{$row->nilaiUH}}</td>
                                    <td>{{$row->nilaiUTS}}</td>
                                    <td>{{$row->nilaiUAS}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
