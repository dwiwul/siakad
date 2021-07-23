@extends('sbadmin/guru_master')
@section('title', 'nilai guru')

@section('content')
    {{ session('sukses') }}
    <h1 class="h3 mb-4 text-gray-800">List Mata Pelajaran</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($mapel as $mpl)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $mpl->namaMapel }}</td>
                                    <td>{{ $mpl->namaKelas }}</td>

                                    <td>
                                        <a class="btn btn-success" href="{{ url('/detailNilai/' . $mpl->idMapel) }}">
                                            <i class="fa fa-eye"></i>Detail</a>
                                        <a class="btn btn-warning" href="{{ url('/listSiswa/' . $mpl->idJadwal) }}">
                                            <i class="fa fa-edit"></i>Input Nilai</a>

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
