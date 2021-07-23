@extends('sbadmin/kepsek_master')
@section('title', 'info')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Pengumuman</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pengumuman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($info as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->tgl}}</td>
                                    <td>{{$item->pengumuman}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/info/edit/'.$item->idInfo)}}">
                                            <i class="fa fa-edit"></i></a>
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

