@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Siswa</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/siswa/'.$idSiswa)}}"method="POST">
                @csrf
                @method('patch')
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idSemester">Tahun</label>
                                <select id="idSemester" name="idSemester" class="form-control @error('idSemester') is-invalid @enderror select2bs4">
                                    {{-- <option>-- Pilih Kelas --</option> --}}
                                    @foreach($semester as $data)
                                        <option value="{{ $data->idSemester }}">{{ $data->tahunAjaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NISN</label>
                                <input type="text" value="{{$siswa->nis}}" class="form-control" id="nis" name="nis">
                                @error('nis')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahunAngkatan">tahunAngkatan</label>
                                <input type="text" value="{{$siswa->tahunAngkatan}}" class="form-control" id="tahunAngkatan" name="tahunAngkatan">
                                @error('tahunAngkatan')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idKelas">Kelas</label>
                                <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">
                                    {{-- <option>-- Pilih Kelas --</option> --}}
                                    @foreach($kelas as $data)
                                        <option value="{{ $data->idKelas }}">{{ $data->namaKelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaSiswa">Nama Siswa</label>
                                <input type="text" value="{{$siswa->namaSiswa}}" class="form-control" id="namaSiswa" name="namaSiswa">
                                @error('namaSiswa')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                    <select value="{{$siswa->jk}}" class="form-control" name="jk" id="jk">
                                        {{-- <option>--Pilihan--</option> --}}
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="{{$siswa->alamat}}"class="form-control" id="alamat" name="alamat">
                                @error('alamat')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tmpLahir">Tempat Lahir</label>
                                <input type="text" value="{{$siswa->tmpLahir}}" class="form-control" id="tmpLahir" name="tmpLahir">
                                @error('tmpLahir')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tglLahir">Tanggal</label>
                                <input type="date" value="{{$siswa->tglLahir}}" class="form-control" id="tglLahir" name="tglLahir">
                                @error('tglLahir')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telp">Telp/HP</label>
                                <input type="text" value="{{$siswa->telp}}" class="form-control" id="telp" name="telp">
                                @error('telp')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaOrtu">Nama OrangTua</label>
                                <input type="text" value="{{$siswa->namaOrtu}}" class="form-control" id="namaOrtu" name="namaOrtu">
                                @error('namaOrtu')
                                    <small class="text-danger">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                    <select value="{{$siswa->status}}" class="form-control" name="status" id="status">
                                        {{-- <option>--Pilihan--</option> --}}
                                        <option value="Siswa" {{$siswa->status == 'Siswa' ? 'selected' : ''}}>Siswa</option>
                                        <option value="Alumni" {{$siswa->status == 'Alumni' ? 'selected' : ''}}>Alumni</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('admin/siswa/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
        </div>
    </div>
@endsection


