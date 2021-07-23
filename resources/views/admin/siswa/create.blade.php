@extends('sbadmin/master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
    </div>
    <div class="card-body">
        <form action="{{url('admin/siswa')}}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="idSemester">Tanggal Mulai</label>
                            <select id="idSemester" name="idSemester" class="form-control @error('idSemester') is-invalid @enderror select2bs4">
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
                            <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">
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
                            <input type="text" class="form-control" id="nis" name="nis" value="{{old('nis')}}">
                            @error('nis')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- <input type="hidden" class="form-control" id="idKelas" name="idKelas"> -->
                            <label for="tahunAngkatan">Tahun Angkatan</label>
                            <input type="text" class="form-control" id="tahunAngkatan" name="tahunAngkatan" value="{{old('tahunAngkatan')}}">
                            @error('tahunAngkatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaSiswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="namaSiswa" name="namaSiswa" value="{{old('namaSiswa')}}">
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
                            <input type="text" class="form-control" id="tmpLahir" name="tmpLahir" value="{{old('tmpLahir')}}">
                            @error('tmpLahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tglLahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="{{old('tglLahir')}}">
                            @error('tglLahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}">
                            @error('alamat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telp">Telp/HP</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="{{old('telp')}}">
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaOrtu">Nama OrangTua</label>
                            <input type="text" class="form-control" id="namaOrtu" name="namaOrtu" value="{{old('namaOrtu')}}">
                            @error('namaOrtu')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" value="{{old('status')}}">
                                <option>--Pilihan--</option>
                                <option value="Siswa">Siswa</option>
                                <option value="Alumni">Alumni</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{url('admin/siswa/index')}}" class="btn btn-secondary ">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
