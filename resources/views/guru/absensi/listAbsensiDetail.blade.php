@extends('sbadmin/guru_master')
@section('title', 'List Absensi')

@section('content')
    {{ session('sukses') }}
    <h1 class="h3 mb-4 text-gray-800">Data Kehadiran Siswa</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                </tr>
                        </thead>
                        <tbody>


                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <input type="hidden" name="idSiswa[]" value="{{ $item->idSiswa }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->namaSiswa }}</td>
                                    <td class="text-center">
                                        <p>{{ Str::ucfirst($item->keterangan) }}</p>
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
