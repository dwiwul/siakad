@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Custom Tabs -->
          <div class="card">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">DATA SISWA</h3>
              {{-- <h5>{{$semester_aktif}}</h5> --}}
              {{-- <h5>{{$id}}</h5> --}}

              {{-- <div>
              <a href="{{url('pegawai/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
              </div> --}}
              <ul class="nav nav-pills ml-auto p-2">
                  {{-- @foreach($jadwal_senin as $row) --}}
                  <li class="nav-item"><a class="nav-link" href="#Kelas7A" data-toggle="tab">Kelas7A</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Kelas7B" data-toggle="tab">Kelas7B</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Kelas8A" data-toggle="tab">Kelas8A</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Kelas8B" data-toggle="tab">Kelas8B</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Kelas9A" data-toggle="tab">Kelas9A</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Kelas9B" data-toggle="tab">Kelas9B</a></li>
                </ul>
                {{-- @endforeach --}}

            </div><!-- /.card-header -->
            {{-- <div>
            <a href="{{url('pegawai/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
            </div> --}}

            <div class="card-body">
              <div class="tab-content">
                  <a href="{{ url('admin/siswa/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a>
                {{-- <button type="button" href="{{ url('admin/siswa/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#create">
                    <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
                <a href="{{url('admin/siswa/cetak-data-siswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-print fa-sm text-white-50"></i> Cetak PDF</a>
                {{-- <a href="{{ url('exportSiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export Excel</a> --}}
                <button type="button" href="{{ url('importSiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-download fa-sm text-white-50"></i> Import Data</button>
                <div class="tab-pane active" id="kelas7A">
                    {{-- <a href="{{url('pegawai/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a> --}}
                  <table id="kelas7A" class="display nowrap table-striped table-bordered table" style="width:100%">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Mulai</th>
                            <th>Angkatan</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Telp/HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas7A as $row)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->semester->tglMulai}}</td>
                            <td>{{$row->tahunAngkatan}}</td>
                            <td>{{$row->nis}}</td>
                            <td>{{$row->namaSiswa}}</td>
                            <td>{{$row->telp}}</td>
                              <td>
                                <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                {{-- <button type="button" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit"> --}}
                                    {{-- <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
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

                <!-- /.tab-pane -->
                <div class="tab-pane" id="kelas7B">
                  <table id="kelas7B" class="display nowrap table-striped table-bordered table" style="width:100%">
                  {{-- <table id="2" class="table table-condensed"> --}}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Mulai</th>
                            <th>Angkatan</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Telp/HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas7B as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$row->semester->tglMulai}}</td>
                          <td>{{$row->tahunAngkatan}}</td>
                          <td>{{$row->nis}}</td>
                          <td>{{$row->namaSiswa}}</td>
                          <td>{{$row->telp}}</td>
                            <td>
                              <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                              {{-- <button type="button" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit"> --}}
                                  {{-- <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
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
                <!-- /.tab-pane -->
                <div class="tab-pane" id="kelas8A">
                    <table id="kelas8A" class="display nowrap table-striped table-bordered table" style="width:100%">
                    {{-- <table id="2" class="table table-condensed"> --}}
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Mulai</th>
                              <th>Angkatan</th>
                              <th>NISN</th>
                              <th>Nama Siswa</th>
                              <th>Telp/HP</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($kelas8A as $row)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->semester->tglMulai}}</td>
                            <td>{{$row->tahunAngkatan}}</td>
                            <td>{{$row->nis}}</td>
                            <td>{{$row->namaSiswa}}</td>
                            <td>{{$row->telp}}</td>
                              <td>
                                <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                {{-- <button type="button" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit"> --}}
                                    {{-- <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
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

                  <div class="tab-pane" id="kelas8B">
                    <table id="kelas8B" class="display nowrap table-striped table-bordered table" style="width:100%">
                    {{-- <table id="2" class="table table-condensed"> --}}
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Mulai</th>
                              <th>Angkatan</th>
                              <th>NISN</th>
                              <th>Nama Siswa</th>
                              <th>Telp/HP</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($kelas8B as $row)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->semester->tglMulai}}</td>
                            <td>{{$row->tahunAngkatan}}</td>
                            <td>{{$row->nis}}</td>
                            <td>{{$row->namaSiswa}}</td>
                            <td>{{$row->telp}}</td>
                              <td>
                                <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                {{-- <button type="button" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit"> --}}
                                    {{-- <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
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


                  <div class="tab-pane" id="kelas9A">
                    <table id="kelas9A" class="display nowrap table-striped table-bordered table" style="width:100%">
                    {{-- <table id="2" class="table table-condensed"> --}}
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Mulai</th>
                              <th>Angkatan</th>
                              <th>NISN</th>
                              <th>Nama Siswa</th>
                              <th>Telp/HP</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($kelas9A as $row)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->semester->tglMulai}}</td>
                            <td>{{$row->tahunAngkatan}}</td>
                            <td>{{$row->nis}}</td>
                            <td>{{$row->namaSiswa}}</td>
                            <td>{{$row->telp}}</td>
                              <td>
                                <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                {{-- <button type="button" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit"> --}}
                                    {{-- <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
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

                  <div class="tab-pane" id="kelas9B">
                    <table id="kelas9B" class="display nowrap table-striped table-bordered table" style="width:100%">
                    {{-- <table id="2" class="table table-condensed"> --}}
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Mulai</th>
                              <th>Angkatan</th>
                              <th>NISN</th>
                              <th>Nama Siswa</th>
                              <th>Telp/HP</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($kelas9B as $row)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->semester->tglMulai}}</td>
                            <td>{{$row->tahunAngkatan}}</td>
                            <td>{{$row->nis}}</td>
                            <td>{{$row->namaSiswa}}</td>
                            <td>{{$row->telp}}</td>
                              <td>
                                <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                {{-- <button type="button" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit"> --}}
                                    {{-- <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
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
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- ./card -->
        </div>
        <!-- /.col -->
      </div>
  </div>
</section>
@endsection
