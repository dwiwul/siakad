@extends('sbadmin/master')
@section('title', 'pembayaran')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">PEMBAYARAN</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{ url('admin/pembayaran/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a> --}}
                <button type="button" href="{{ url('admin/pembayaran')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button>
                <a href="{{url('admin/pembayaran/cetak-data-pembayaran')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-print fa-sm text-white-50"></i> Laporan PDF</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Kelas</th>
                                <th>Siswa</th>
                                <th>Tanggal</th>
                                <th>Jenis Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($pembayaran as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->semester->tahunAjaran}}</td>
                                    <td>{{$row->kelas->namaKelas}}</td>
                                    <td>{{$row->siswa->namaSiswa}}</td>
                                    <td>{{$row->tgl}}</td>
                                    <td>{{$row->detailbayar->jenisBayar}}</td>
                                    <td>{{$row->jumlahBayar}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/pembayaran/edit/'.$row->idPembayaran)}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" action="{{url('admin/pembayaran/destroy/'.$row->idPembayaran)}}">
                                                {{ csrf_field() }}
                                                @method('delete')
                                                <input type="hidden" value="DELETE" name="_method">
                                                <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                        {{-- <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{url('admin/pembayaran/destroy/'.$row->idPembayaran)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action ('PembayaranController@store')}}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                {{ method_field('POST') }}
                                                {{ @csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="idSemester">Tahun</label>
                                                            <select name="idSemester" class="form-control">
                                                                @foreach($semester as $row)
                                                                    <option value="{{$row->idSemester}}">{{$row->tahunAjaran}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="idKelas">Kelas</label>
                                                            <select name="idKelas" class="form-control">
                                                                @foreach($kelas as $row)
                                                                    <option value="{{$row->idKelas}}">{{$row->namaKelas}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="idSiswa">Siswa</label>
                                                            <select name="idSiswa" class="form-control">
                                                                @foreach($siswa as $row)
                                                                    <option value="{{$row->idSiswa}}">{{$row->namaSiswa}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl">Tanggal</label>
                                                            <input type="date" class="form-control" id="tgl" name="tgl">
                                                            @error('tgl')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="idBayar">Jenis Bayar</label>
                                                            <select name="idBayar" class="form-control">
                                                                @foreach($detailbayar as $row)
                                                                    <option value="{{$row->idBayar}}">{{$row->jenisBayar}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="jumlahBayar">Jumlah Bayar</label>
                                                            <input type="text" class="form-control" id="jumlahBayar" name="jumlahBayar">
                                                            @error('jumlahBayar')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

