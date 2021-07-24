@extends('sbadmin/guru_master')
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
                                            <button type="button" href="{{ url('guru/lihat-info/edit/'.$item->idInfo)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal-{{$item->idInfo}}">
                                                    <i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        @foreach ($info as $row)
                        <div class="modal fade" id="editModal-{{$row->idInfo}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal">Ubah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{-- url('admin/siswa/.$idSiswa --}}
                                    <form action="{{ url('guru/lihat-info/'.$row->idInfo)}}" method="post" id="editModal" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        {{ @csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl">Tanggal</label>
                                                            <input type="date" class="form-control" id="tgl" name="tgl" value="{{$row->tgl}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pengumuman">Pengumuman</label>
                                                            <input type="text" id="pengumuman" name="pengumuman" class="form-control @error('pengumuman') is-invalid @enderror select2bs4" value="{{$row->pengumuman}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

