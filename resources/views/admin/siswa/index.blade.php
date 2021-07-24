@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Siswa</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-8">
                        <button type="button" href="{{ url('admin/siswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#create">
                            <i class="fas fa-plus fa-sm text-white-50"></i></button>
                        {{-- <a href="{{ url('admin/siswa/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a> --}}
                        <a href="{{url('admin/cetak-siswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" rel="noopener noreferrer"><i
                            class="fas fa-print fa-sm text-white-50"></i> Laporan PDF</a>
                        <a href="{{ url('exportSiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success"><i
                            class="fas fa-upload fa-sm text-white-50"></i> Export Excel</a>
                            <button type="button" href="{{ url('importSiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-download fa-sm text-white-50"></i> Import Data</button>
                    </div>
                    <div class="col-md-2 text-right">
                        Tahun Angkatan
                    </div>
                    <div class="col-md-2">
                        <select id="tahun-ajaran" class="form-control">
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Telp/HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nis}}</td>
                                    <td>{{$row->namaSiswa}}</td>
                                    <td>{{$row->kelas->namaKelas}}</td>
                                    <td>{{$row->telp}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>
                                        <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <button type="button" href="{{ url('admin/siswa/edit/'.$row->idSiswa)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal-{{$row->idSiswa}}">
                                            <i class="fas fa-edit"></i></button>
                                        {{-- <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#EditModal"><i class="fa fa-edit"></i></button> --}}
                                        {{-- <a class="btn btn-outline-warning" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}"><i class="fa fa-edit"></i></a> --}}
                                        <form method="POST" class="d-inline"
                                            action="{{url('admin/siswa/destroy/'.$row->idSiswa)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url ('importSiswa')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{method_field('PUT')}}
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="create">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ action ('SiswaController@store')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ method_field('POST') }}
                                    {{ @csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="idSemester">Tanggal Mulai</label>
                                                <select id="idSemester" name="idSemester" class="form-control @error('idSemester') is-invalid @enderror select2bs4" required>
                                                    <option>-- Pilih Tanggal Mulai --</option>
                                                    @foreach($semester as $data)
                                                        <option value="{{ $data->idSemester }}">{{ $data->tglMulai }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="idKelas">Kelas</label>
                                                <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4" required>
                                                    <option>-- Pilih Kelas--</option>
                                                    @foreach($kelas as $data)
                                                        <option value="{{ $data->idKelas }}">{{ $data->namaKelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <input type="hidden" class="form-control" id="idKelas" name="idKelas"> -->
                                                <label for="nis">NISN</label>
                                                <input type="text" class="form-control" id="nis" name="nis" value="{{old('nis')}}" required>
                                                @error('nis')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <input type="hidden" class="form-control" id="idKelas" name="idKelas"> -->
                                                <label for="tahunAngkatan">Tahun Angkatan</label>
                                                <input type="text" class="form-control" id="tahunAngkatan" name="tahunAngkatan" value="{{old('tahunAngkatan')}}" required>
                                                @error('tahunAngkatan')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaSiswa">Nama Siswa</label>
                                                <input type="text" class="form-control" id="namaSiswa" name="namaSiswa" value="{{old('namaSiswa')}}" required>
                                                @error('namaSiswa')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" id="jk" value="{{old('jk')}}">
                                                    <option>--Pilihan--</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tmpLahir">Tempat</label>
                                                <input type="text" class="form-control" id="tmpLahir" name="tmpLahir" value="{{old('tmpLahir')}}" required>
                                                @error('tmpLahir')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tglLahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="{{old('tglLahir')}}" required>
                                                @error('tglLahir')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}" required>
                                                @error('alamat')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telp">Telp/HP</label>
                                                <input type="text" class="form-control" id="telp" name="telp" value="{{old('telp')}}" required>
                                                @error('telp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaOrtu">Nama OrangTua</label>
                                                <input type="text" class="form-control" id="namaOrtu" name="namaOrtu" value="{{old('namaOrtu')}}" required>
                                                @error('namaOrtu')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status" id="status" value="{{old('status')}}" required>
                                                    <option>--Pilihan--</option>
                                                    <option value="Siswa">Siswa</option>
                                                    <option value="Alumni">Alumni</option>
                                                </select>
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

            {{-- edit modal --}}
            @foreach ($siswa as $swa)
            <div class="modal fade" id="editModal-{{$swa->idSiswa}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModal">Ubah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{-- url('admin/siswa/.$idSiswa --}}
                        <form action="{{ url('admin/siswa/'.$swa->idSiswa)}}" method="post" id="editModal" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ @csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <input type="hidden" class="form-control" id="idKelas" name="idKelas"> -->
                                                <label for="tahunAngkatan">Tahun Angkatan</label>
                                                <input type="text" class="form-control" id="tahunAngkatan" name="tahunAngkatan" value="{{$swa->tahunAngkatan}}" required>
                                                @error('tahunAngkatan')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="idSemester">Tahun</label>
                                                <select id="idSemester" name="idSemester" class="form-control @error('idSemester') is-invalid @enderror select2bs4">

                                                    @foreach($semester as $data)
                                                        <option value="{{ $data->idSemester }}">{{ $data->tahunAjaran }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="idKelas">Kelas</label>
                                                <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">

                                                    @foreach($kelas as $data)
                                                        <option value="{{ $data->idKelas }}">{{ $data->namaKelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nis">NISN</label>
                                                <input id="nis" name="nis" class="form-control @error('nis') is-invalid @enderror select2bs4" value="{{ $swa->nis }}">
                                                    {{-- <option>-- Pilih Kelas --</option> --}}
                                                    {{-- @foreach($siswa as $data) --}}
                                                        {{-- <option value="{{ $data->idSiswa }}">{{ $data->nis }}</option> --}}
                                                    {{-- @endforeach --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaSiswa">Nama Siswa</label>
                                                <input id="namaSiswa" name="namaSiswa" class="form-control @error('namaSiswa') is-invalid @enderror select2bs4" value="{{$swa->namaSiswa}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" id="jk" value="{{old('jk')}}">
                                                    <option>--Pilihan--</option>
                                                    <option value="L" {{ $swa->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="P" {{ $swa->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" id="jk" value="{{old('jk')}}">
                                                    <option>--Pilihan--</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tmpLahir">Tempat Lahir</label>
                                                <input id="tmpLahir" name="tmpLahir" class="form-control @error('tmpLahir') is-invalid @enderror select2bs4" value="{{$swa->tmpLahir}}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tglLahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="{{$swa->tglLahir}}" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="idSiswa">Tanggal Lahir</label>
                                                <select id="idSiswa" type="date"name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                                                    {{-- <option>-- Pilih Kelas --</option> --}}
                                                    {{-- @foreach($siswa as $data)
                                                        <option value="{{ $data->idSiswa }}">{{ $data->tglLahir }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                        {{-- </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror select2bs4" value="{{$swa->alamat}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telp">Telp</label>
                                                <input id="telp" name="telp" class="form-control @error('telp') is-invalid @enderror select2bs4" value="{{$swa->telp}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaOrtu">Nama Orang Tua</label>
                                                <input id="namaOrtu" name="namaOrtu" class="form-control @error('namaOrtu') is-invalid @enderror select2bs4" value="{{$swa->namaOrtu}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status" id="status" value="{{old('status')}}">
                                                    <option>--Pilihan--</option>
                                                    <option value="Siswa" {{ $swa->status == 'Siswa' ? 'selected' : '' }}>Siswa</option>
                                                    <option value="Alumni" {{ $swa->status == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                                                </select>
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

        </div>
        @include('sweetalert::alert')
    </div>
@endsection
@section('js')
<script>
    const select = $('#tahun-ajaran');

    $.ajax({
        url: '{{ url("admin/siswa/tahunajaran") }}',
        success: (data) => {
            for (let i = 0; i < data.length; i++) {
                const e = data[i].tahunAngkatan;

                select.append(
                    '<option value="'+e+'">'+e+'</option>'
                );
            }
        }
    })

    select.on('change', () => {
        $.ajax({
            url: "{{ url('admin/siswa/tahunajaran') }}/"+ select.val(),
            success: (data) => {
                const element = $('#dataTable').find('tbody');
                element.empty();
                for (let i = 0; i < data.length; i++) {
                    const e = data[i];

                    element.append(
                        `<tr>`+
                            `<td>`+i+`</td>`+
                            `<td>`+e.nis+`</td>`+
                            `<td>`+e.namaSiswa+`</td>`+
                            `<td>`+e.namaKelas+`</td>`+
                            `<td>`+e.telp+`</td>`+
                            `<td>`+e.status+`</td>`+
                            `<td>`+
                            `<a href="{{url('/admin/siswa/show')}}/`+e.idSiswa+`" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>`+
                            `<button type="button" href="{{ url('admin/siswa/edit')}}/`+e.idSiswa+`" class="btn btn-outline-warning" data-toggle="modal" data-target="#editModal">`+
                                `<i class="fas fa-edit"></i>`+
                            `</button>`+

                            `<form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?') Alert::question('Question Title', 'Question Message');"`+
                                `action="{{url('admin/siswa/destroy')}}/`+e.idSiswa+`">`+
                                `{{ csrf_field() }}`+
                                `@method('delete')`+
                                `<input type="hidden" value="DELETE" name="_method">`+
                                `<button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>`+
                            `</form>`+
                            `</td>`+
                        `</tr>`
                    )
                }
            }
        }).done(() => {
            console.log('done!');
        })
    });



</script>
@endsection
