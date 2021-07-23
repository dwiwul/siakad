@extends('sbadmin/master')
@section('title', 'pembelajaran')

@section('content')
{{session('sukses')}}
        <!-- DataTales Example -->
        <h1 class="h3 mb-4 text-gray-800">Data Pengajar</h1>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <a href="{{ url('admin/pembelajaran/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a>
        </div>
        <div class="row">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl Mulai - Selesai</th>
                                <th>Pegawai</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelajaran as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->semester->tglMulai}}, {{$row->semester->tglSelesai}} </td>
                                    <td>{{$row->pegawai->namaPegawai}}</td>
                                    <td>{{$row->mapel->namaMapel}}</td>
                                    <td>{{$row->kelas->namaKelas}}</td>
                                    <td>
                                        <a href="{{ url('admin/pembelajaran/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a>
                                        <a href="{{url('/admin/jadwal/pilihJadwal/'.$row->idPembelajaran)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

