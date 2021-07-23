@extends('sbadmin/master')
@section('title', 'Detail Siswa')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
			<div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-dark">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{$siswa->namaSiswa}}</h3>
                <h6 class="widget-user-desc">{{$siswa->nis}}</h6>
                <h5 class="widget-user-desc">{{$siswa->kelas->namaKelas}}</h5>
                <h5 class="widget-user-desc">{{$siswa->semester->tglMulai}}</h5>
              </div>
              <div class="table-responsive">
                <table class = "table">
                  <tbody>
                    <tr>
                      <th>Tempat, tanggal lahir :</th>
                      <td>{{$siswa->tmpLahir}}, {{$siswa->tglLahir}}</td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin :</th>
                      <td>{{$siswa->jk}}</td>
                    </tr>
                    <tr>
                      <th>Alamat :</th>
                      <td>{{$siswa->alamat}}</td>
                    </tr>
                    <tr>
                      <th>No Hp :</th>
                      <td>{{$siswa->telp}}</td>
                    </tr>
                    <tr>
                        <th>Nama Orang Tua :</th>
                        <td>{{$siswa->namaOrtu}}</td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td>{{$siswa->status}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-body">
                  <a href="{{url('admin/siswa/index')}}" class="btn btn-outline-primary">Kembali</a>
              </div>
            </div>
			</div>
		</div>
	</div>
</section>
@endsection
