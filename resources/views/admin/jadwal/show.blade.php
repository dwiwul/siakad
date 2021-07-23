@extends('sbadmin/master')
@section('title', 'jadwal')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Custom Tabs -->
          <div class="card">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">Jadwal Kelas</h3>
              {{-- <h5>{{$semester_aktif}}</h5> --}}
              {{-- <h5>{{$id}}</h5> --}}

              {{-- <div>
              <a href="{{url('pegawai/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
              </div> --}}
              <ul class="nav nav-pills ml-auto p-2">
                  {{-- @foreach($jadwal_senin as $row) --}}
                <li class="nav-item"><a class="nav-link" href="#Senin" data-toggle="tab">Senin</a></li>
                <li class="nav-item"><a class="nav-link" href="#Selasa" data-toggle="tab">Selasa</a></li>
                <li class="nav-item"><a class="nav-link" href="#Rabu" data-toggle="tab">Rabu</a></li>
                <li class="nav-item"><a class="nav-link" href="#Kamis" data-toggle="tab">Kamis</a></li>
                <li class="nav-item"><a class="nav-link" href="#Jumat" data-toggle="tab">Jumat</a></li>
                <li class="nav-item"><a class="nav-link" href="#Sabtu" data-toggle="tab">Sabtu</a></li>
                <li class="nav-item"><a class="nav-link" href="#Minggu" data-toggle="tab">Minggu</a></li>
                {{-- @endforeach --}}

            </div><!-- /.card-header -->
            {{-- <div>
            <a href="{{url('pegawai/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
            </div> --}}

            <div class="card-body">
              <div class="tab-content">
                {{-- <button type="button" href="{{ url('admin/jadwal')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#create">
                    <i class="fas fa-plus fa-sm text-white-50"></i></button> --}}
                  <a href="{{url('admin/jadwal/create/'.$id)}}" class="btn btn-small btn-primary mb-1"><i class="fas fa-plus mr-1"></i></a>
                <div class="tab-pane active" id="Senin">
                    {{-- <a href="{{url('pegawai/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a> --}}
                  <table id="jadwal_senin" class="display nowrap table-striped table-bordered table" style="width:100%">
                    <thead class="">
                        <tr>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal_senin as $row)
                          <tr>
                              <td>{{$row->jamMulai}}-{{$row->jamSelesai}}</td>
                              <td>{{$row->mapel->namaMapel}}</td>
                              <td>{{$row->pegawai->namaPegawai}}</td>
                              <td>
                                    <a href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    <form method="POST" class="d-inline" action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                  {{-- <a href="{{url('/pegawai/schedules/show/')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i>detail</a> --}}

                                  {{-- <form action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
                                  </form> --}}
                              </td>
                          </tr>
                              @endforeach

                    </tbody>
                  </table>
                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="Selasa">
                  <table id="jadwal_selasa" class="display nowrap table-striped table-bordered table" style="width:100%">
                  {{-- <table id="2" class="table table-condensed"> --}}
                    <thead>
                        <tr>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach($jadwal_selasa as $row)
                          <tr>
                              <td>{{$row->jamMulai}}-{{$row->jamSelesai}}</td>
                              <td>{{$row->mapel->namaMapel}}</td>
                              <td>{{$row->pegawai->namaPegawai}}</td>
                              <td>
                                  {{-- <a href="{{url('/pegawai/schedules/show/')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i>detail</a> --}}
                                    <a href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    <form method="POST" class="d-inline" action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                    </form>

                                  {{-- <form action="{id}}" method="post" class="d-inline">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
                                  </form> --}}
                              </td>
                          </tr>
                              @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="Rabu">
                  <table id="jadwal_rabu" class="display nowrap table-striped table-bordered table" style="width:100%">
                  {{-- <table id="3" class="table table-condensed"> --}}
                      <thead class="">
                          <tr>
                              <th>Jam</th>
                              <th>Mata Pelajaran</th>
                              <th>Guru</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($jadwal_rabu as $row)
                            <tr>
                                <td>{{$row->jamMulai}}-{{$row->jamSelesai}}</td>
                                <td>{{$row->mapel->namaMapel}}</td>
                                <td>{{$row->pegawai->namaPegawai}}</td>
                                <td>
                                    {{-- <a href="{{url('/pegawai/schedules/show/')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i>detail</a> --}}
                                    <a href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    <form method="POST" class="d-inline" action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                    {{-- <form action="{id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                                @endforeach

                      </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="Kamis">
                  <table id="jadwal_kamis" class="display nowrap table-striped table-bordered table" style="width:100%">
                  {{-- <table id="4" class="table table-condensed"> --}}
                      <thead class="">
                          <tr>
                              <th>Jam</th>
                              <th>Mata Pelajaran</th>
                              <th>Guru</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($jadwal_kamis as $row)
                            <tr>
                                <td>{{$row->jamMulai}}-{{$row->jamSelesai}}</td>
                                <td>{{$row->mapel->namaMapel}}</td>
                                <td>{{$row->pegawai->namaPegawai}}</td>
                                <td>
                                    {{-- <a href="{{url('/pegawai/schedules/show/')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i>detail</a> --}}
                                    <a href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    <form method="POST" class="d-inline" action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                    {{-- <form action="{id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
                                    </form> --}}

                                </td>
                            </tr>
                                @endforeach

                      </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="Jumat">
                  <table id="jadwal_jumat" class="display nowrap table-striped table-bordered table" style="width:100%">
                  {{-- <table id="5" class="table table-condensed"> --}}
                      <thead class="">
                          <tr>
                              <th>Jam</th>
                              <th>Mata Pelajaran</th>
                              <th>Guru</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                        @foreach($jadwal_jumat as $row)
                            <tr>
                                <td>{{$row->jamMulai}}-{{$row->jamSelesai}}</td>
                                <td>{{$row->mapel->namaMapel}}</td>
                                <td>{{$row->pegawai->namaPegawai}}</td>
                                <td>
                                    {{-- <a href="{{url('/pegawai/schedules/show/')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i>detail</a> --}}
                                    <a href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    <form method="POST" class="d-inline" action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                    {{-- <form action="{id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
                                    </form> --}}

                                </td>
                            </tr>
                                @endforeach

                      </tbody>
                    </table>
                </div>

                <div class="tab-pane" id="Sabtu">
                    <table id="jadwal_sabtu" class="display nowrap table-striped table-bordered table" style="width:100%">
                    {{-- <table id="5" class="table table-condensed"> --}}
                        <thead class="">
                            <tr>
                                <th>Jam</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                          @foreach($jadwal_sabtu as $row)
                              <tr>
                                  <td>{{$row->jamMulai}}-{{$row->jamSelesai}}</td>
                                  <td>{{$row->mapel->namaMapel}}</td>
                                  <td>{{$row->pegawai->namaPegawai}}</td>
                                  <td>
                                      {{-- <a href="{{url('/pegawai/schedules/show/')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i>detail</a> --}}
                                        <a href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                      {{-- <form action="{id}}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
                                      </form> --}}

                                  </td>
                              </tr>
                                  @endforeach

                        </tbody>
                      </table>
                </div>

                <div class="tab-pane" id="Minggu">
                    <table id="jadwal_minggu" class="display nowrap table-striped table-bordered table" style="width:100%">
                    {{-- <table id="5" class="table table-condensed"> --}}
                        <thead class="">
                            <tr>
                                <th>Jam</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                          @foreach($jadwal_minggu as $row)
                              <tr>
                                  <td>{{$row->jamMulai}}-{{$row->jamSelesai}}</td>
                                  <td>{{$row->mapel->namaMapel}}</td>
                                  <td>{{$row->pegawai->namaPegawai}}</td>
                                  <td>
                                      {{-- <a href="{{url('/pegawai/schedules/show/')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i>detail</a> --}}
                                        <a href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" action="{{url('admin/jadwal/destroy/'.$row->idJadwal)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                      {{-- <form action="{id}}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
                                      </form> --}}

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
