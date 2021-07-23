@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Siswa</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/siswa/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a>
                <a href="{{url('admin/siswa/cetak-data-siswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-print fa-sm text-white-50"></i> Cetak PDF</a>
                {{-- <a href="{{ url('exportSiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export Excel</a> --}}
                <button type="button" href="{{ url('importSiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-download fa-sm text-white-50"></i> Import Data</button>
                <form action="{{ route('admin.siswa.index') }}" method="get" style="display: inline-block">
                    {{-- <div class="d-none d-sm-inline-block shadow-sm">
                        <select id="idSiswa" name="siswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                            <option value="" selected>-- Pilih Tahun Angkatan --</option>
                            <option value="2018" selected>2018</option>
                            <option value="2019" selected>2019</option>
                            <option value="2021" selected>2021</option>
                                {{-- @foreach($semester as $data)
                                    <option value="{{ $data->idSemester }}" {{ $data->idSemester == $filter['semester'] ? 'selected' : null }}>{{ $data->tahunAjaran }}</option>
                                @endforeach --}}
                        {{-- </select>
                    </div> --}}

                    {{-- <div class="d-none d-sm-inline-block shadow-sm">
                        <select id="idSemester" name="semester" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                            <option value="" selected>-- Pilih Tahun Angkatan --</option>
                                @foreach($semester as $data)
                                    <option value="{{ $data->idSiswa }}" {{ $data->idSiswa == $filter['semester'] ? 'selected' : null }}>{{ $data->tahunAjaran }}</option>
                                @endforeach
                        </select>
                    </div> --}}
                    <div class="d-none d-sm-inline-block shadow-sm">
                        <select onchange="this.form.submit()" id="idSemester" name="semester" class="form-control @error('idSemester') is-invalid @enderror select2bs4">
                            <option value="" selected>-- Pilih Tahun Angkatan --</option>
                                @foreach($semester as $data)
                                    <option value="{{ $data->idSemester }}" {{ $data->idSemester == $filter['semester'] ? 'selected' : null }}>{{ $data->tahunAjaran }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="d-none d-sm-inline-block shadow-sm">
                        <select onchange="this.form.submit()" id="idKelas" name="kelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">
                            <option value="" selected>-- Pilih Kelas --</option>
                                @foreach($kelas as $data)
                                    <option value="{{ $data->idKelas }}" {{ $data->idKelas == $filter['kelas'] ? 'selected' : null }}>{{ $data->namaKelas }}</option>
                                @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>Ajaran</th> --}}
                                <th>Angkatan</th>
                                <th>Kelas</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Telp/HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    {{-- <td>{{$row->semester->tahunAjaran}}</td> --}}
                                    <td>{{$row->tahunAngkatan}}</td>
                                    <td>{{$row->kelas->namaKelas}}</td>
                                    <td>{{$row->nis}}</td>
                                    <td>{{$row->namaSiswa}}</td>
                                    <td>{{$row->telp}}</td>
                                    {{-- <td>{{$row->where('namaSiswa', $siswa->namaSiswa)->count()}} Siswa</td> --}}
                                    <td>
                                        <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <a class="btn btn-outline-warning" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}"><i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?') Alert::question('Question Title', 'Question Message');"
                                            action="{{url('admin/siswa/destroy/'.$row->idSiswa)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
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
                                    {{ method_field('PUT') }}
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        @include('sweetalert::alert')
    </div>
@endsection


@section('js')
    <script>
        function removeUndefined(value) {
            return value === undefined ? '' : value
        }

        $('#idSemester').on('change', function() {
            if($('#idSemester').val() != '') {
                $('#dataTable').find('tbody').html('');

                $.ajax({
                    url: "{{ url('admin/siswa/filtersiswa') }}/" + $('#idSemester').val(),
                    method: 'get',
                    success: function(data) {
                        for(let i=0; i < data.length; i++) {
                            console.log(data[i])
                            $('#dataTable').find('tbody').append(
                                "<tr>"+
                                    "<td>"+ i + 1 +"</td>"+
                                    "<td>"+ removeUndefined(data[i].tahunAjaran) +"</td>"+
                                    "<td>"+ removeUndefined(data[i].tahunAngkata)n +"</td>"+
                                    "<td>"+ removeUndefined(data[i].namaKelas) +"</td>"+
                                    "<td>"+ removeUndefined(data[i].nis) +"</td>"+
                                    "<td>"+ removeUndefined(data[i].namaSiswa) +"</td>"+
                                    "<td>"+ removeUndefined(data[i].telp) +"</td>"+
                                    "<td>"+ removeUndefined(data[i].namaSiswa) +"</td>"+
                                    "<td>"+
                                        `<a href="{{url('/admin/siswa/show/')}}`+ data[i].idSiswa +`" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>`+
                                        `<a class="btn btn-outline-warning" href="{{url('admin/siswa/edit/')}}`+ data[i].idSiswa +`"><i class="fa fa-edit"></i></a>`+
                                        `<form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?') Alert::question('Question Title', 'Question Message');" action="{{url('admin/siswa/destroy/')}}`+ data[i].idSiswa +`">`+
                                            `{{ csrf_field() }}`+
                                            `@method('delete')`+
                                            `<input type="hidden" value="DELETE" name="_method">`+
                                            `<button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>`+
                                        `</form>`+
                                    "</td>"+
                                "</tr>"
                            )
                        }
                    }, error: function(data) {
                        console.log(data);
                    }
                });
            }
        })
    </script>
@endsection

