@extends('sbadmin/master')
@section('title', 'kelas')

@section('content')
{{session('sukses')}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2>  Data Kelas</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($kelas as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->namaKelas}}</td>
                                    <td>
                                        <a href="{{url('/admin/histori/show-histori/'.$row->idKelas)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

