@extends('sbadmin/master')
@section('title', 'lks')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Pembayaran LKS</h1>
    <div class="container-fluid">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h4 class="h3 mb-4 text-gray-800">Cetak Pertanggal</h4>
            </div>
            <div class="card-body">
            @csrf
            <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tglawal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tglawal" name="tglawal">
                            @error('tglawal')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tglakhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tglakhir" name="tglakhir">
                            @error('tglakhir')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="" onclick="this.href='/admin/lks/cetak-data-lks/' + document.getElementById('tglawal').value +
                            '/' +  document.getElementById('tglakhir').value" target="_blank"
                            class="btn btn-success col-md-5">Cetak<i class="fas fa-print"></i>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="{{ url('admin/lks/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a> --}}
                <button type="button" href="{{ url('admin/lks')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i></button>
                {{-- <a href="{{url('admin/lks/cetak-data-lks')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-print fa-sm text-white-50"></i> Laporan PDF</a> --}}

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
                                <th>Pembayaran</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($lks as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->semester->tahunAjaran}}</td>
                                    <td>{{$row->kelas->namaKelas}}</td>
                                    <td>{{$row->siswa->namaSiswa}}</td>
                                    <td>{{$row->tgl}}</td>
                                    <td>{{$row->jenisBayar}}</td>
                                    <td>Rp {{number_format($row->jumlahBayar, 0)}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/lks/edit/'.$row->idLks)}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" action="{{url('admin/lks/destroy/'.$row->idLks)}}">
                                                {{ csrf_field() }}
                                                @method('delete')
                                                <input type="hidden" value="DELETE" name="_method">
                                                <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                        {{-- <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{url('admin/lks/destroy/'.$row->idlks)}}">
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
                                    <form action="{{ action ('LksController@store')}}" method="post" enctype="multipart/form-data">
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
                                                            <input type="date" class="form-control" id="tgl" name="tgl" required>
                                                            @error('tgl')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="jenisBayar">Jenis Bayar</label>
                                                            <input type="text" class="form-control" id="jenisBayar" name="jenisBayar" required>
                                                            @error('jenisBayar')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="jumlahBayar">Jumlah Bayar</label>
                                                            <input type="text" class="form-control" id="jumlahBayar" name="jumlahBayar" required>
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

