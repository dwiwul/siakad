@extends('sbadmin/kepsek_master')
@section('title', 'Detail pegawai')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
			<div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-dark">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{$pegawai->namaPegawai}}</h3>
                <h6 class="widget-user-desc">{{$pegawai->nip}}</h6>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered data-table">
                  <tbody>
                    <tr>
                      <th>Tempat, tanggal lahir :</th>
                      <td>{{$pegawai->tmpLahir}}, {{$pegawai->tglLahir}}</td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin :</th>
                      <td>{{$pegawai->jk}}</td>
                    </tr>
                    <tr>
                      <th>Alamat :</th>
                      <td>{{$pegawai->alamat}}</td>
                    </tr>
                    <tr>
                      <th>No Hp :</th>
                      <td>{{$pegawai->telp}}</td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td>{{$pegawai->status}}</td>
                      </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-body">
                  <a href="{{url('kepsek/pegawai/index')}}" class="btn btn-outline-primary">Kembali</a>
              </div>
            </div>
			</div>
		</div>
	</div>
</section>
@endsection
