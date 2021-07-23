@extends('sbadmin/master')
@section('title', 'nilai guru')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">NILAI</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/nilai/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Nilai</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Guru</th>
                                <th>Siswa</th>
                                <th>Ulangan Harian</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data['nilai'] as $idNilai =>$nilai)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$nilai->mapel->namaMapel }}</td>
                                    <td>{{$nilai->pegawai->namaPegawai }}</td>
                                    <td>{{$nilai->siswa->namaSiswa }}</td>
                                    <td>{{$nilai->nilaiHarian}}</td>
                                    <td>{{$nilai->nilaiUts}}</td>
                                    <td>{{$nilai->nilaiUas}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('nilai.edit', ['id' => $nilai->idNilai])}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('nilai.destroy', ['id' => $nilai->idNilai ])}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
