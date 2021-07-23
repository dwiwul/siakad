@extends('sbadmin/guru_master')
@section('title', 'petugasTU')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Petugas TU</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Petugas TU</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>HP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugastu as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->namaTU}}</td>
                                    <td>{{$row->jk}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->telp}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Button trigger modal -->
           
        </div>
        @include('sweetalert::alert')
    </div>
@endsection
