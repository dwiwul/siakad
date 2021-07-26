@extends('sbadmin/guru_master')
@section('title', 'List Absensi')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Detail Nilai</h1>

    @if (session('alert'))
        <div class="alert alert-success" role="alert">
            {{ session('alert') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
                                <th>Nilai Tugas</th>
                                <th>Nilai UH</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                                <th>Nilai Praktik</th>
                                <th>Nilai Observasi</th>
                            </tr>
                        </thead>
                        <tbody>


                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->namaSiswa }}</td>
                                    <td>{{ $item->nilaiTugas }}</td>
                                    <td>{{ $item->nilaiUH }}</td>
                                    <td>{{ $item->nilaiUTS }}</td>
                                    <td>{{ $item->nilaiUAS }}</td>
                                    <td>{{ $item->nilaiPraktik }}</td>
                                    <td>{{ $item->nilaiObservasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
