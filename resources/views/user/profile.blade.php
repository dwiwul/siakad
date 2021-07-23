@if (session('level') == 'Pegawai')
{{-- {{ session('level')}} --}}
    @extends('sbadmin/guru_master')
@elseif (session('level') == 'Siswa')
    @extends('sbadmin/siswa_master')
@elseif (session('level') == 'Kepsek')
    @extends('sbadmin/kepsek_master')
@else
    @extends('sbadmin/master')
@endif

@section('title', 'Edit Profil')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title text-capitalize">Edit Profile {{ Auth::user()->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                @if (session('level') == 'Pegawai')
                    <form action="{{ url('/profile/guru/update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)"
                                        value="{{ $data->nip }}" class="form-control @error('nip') is-invalid @enderror"
                                        disabled>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select id="jk" name="jk"
                                        class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" {{ $data->jk == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="P" {{ $data->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaPegawai">Nama Pegawai</label>
                                    <input type="text" id="namaPegawai" name="namaPegawai" value="{{ $data->namaPegawai }}"
                                        class="form-control @error('namaPegawai') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tmpLahir">Tempat Lahir</label>
                                    <input type="text" id="tmpLahir" name="tmpLahir" value="{{ $data->tmpLahir }}"
                                        class="form-control @error('tmpLahir') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tglLahir">Tanggal Lahir</label>
                                    <input type="date" id="tglLahir" name="tglLahir" value="{{ $data->tglLahir }}"
                                        class="form-control @error('tglLahir') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{ $data->alamat }}"
                                        class="form-control @error('alamat') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)"
                                        value="{{ $data->telp }}"
                                        class="form-control @error('telp') is-invalid @enderror">
                                </div>
                            </div>

                        </div>
                        <a href="#" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i>
                            &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Simpan</button>
                    </form>
                @elseif (session('level') == "Siswa")
                    <form action="{{ url('/profile/siswa/update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaSiswa">Nama Siswa</label>
                                    <input type="text" id="namaSiswa" name="namaSiswa" value="{{ $data->namaSiswa }}"
                                        class="form-control @error('namaSiswa') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select id="jk" name="jk"
                                        class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" {{ $data->jk == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="P" {{ $data->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{ $data->alamat }}"
                                        class="form-control @error('alamat') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahunAngkatan">Tahun Angkatan</label>
                                    <input readonly type="text" id="tahunAngkatan" name="tahunAngkatan" value="{{ $data->tahunAngkatan }}"
                                        class="form-control @error('tahunAngkatan') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tmpLahir">Tempat Lahir</label>
                                    <input type="text" id="tmpLahir" name="tmpLahir" value="{{ $data->tmpLahir }}"
                                        class="form-control @error('tmpLahir') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tglLahir">Tanggal Lahir</label>
                                    <input type="date" id="tglLahir" name="tglLahir" value="{{ $data->tglLahir }}"
                                        class="form-control @error('tglLahir') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" id="nis" name="nis" onkeypress="return inputAngka(event)"
                                        value="{{ $data->nis }}"
                                        class="form-control @error('nis') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp" value="{{ $data->telp }}"
                                        onkeypress="return inputAngka(event)"
                                        class="form-control @error('telp') is-invalid @enderror">
                                </div>
                            </div>
                        </div>

                        <a href="#" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i>
                            &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Simpan</button>
                    </form>

                @elseif (session('level') == "Kepsek")
                    <form action="{{ url('/profile/kepsek/update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaKepsek">Nama Kepala Sekolah</label>
                                    <input type="text" id="namaKepsek" name="namaKepsek" value="{{ $data->namaKepsek }}"
                                        class="form-control @error('namaKepsek') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{ $data->alamat }}"
                                        class="form-control @error('alamat') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp" value="{{ $data->telp }}"
                                        onkeypress="return inputAngka(event)"
                                        class="form-control @error('telp') is-invalid @enderror">
                                </div>
                            </div>
                        </div>

                        <a href="#" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i>
                            &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Simpan</button>
                    </form>
                @else
                    <form action="{{ url('/profile/update') }}" method="post">
                        @method('put')
                        @csrf
                        {{-- @else --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" value="{{ Auth::user()->username }}"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="username">Password</label>
                                    <input id="password" type="password" placeholder="Kosongkan jika tidak ingin mengubah"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <a href="#" name="kembali" class="btn btn-default" id="back"><i
                                class='nav-icon fas fa-arrow-left'></i>
                            &nbsp; Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Simpan</button>
                    </form>
                @endif

                {{-- @elseif (Auth::user()->level == "Siswa") --}}


                {{-- @endif --}}
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

        </div>

    </div>
    <!-- /.card -->

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#back').click(function() {
                window.location = "{{ route('profile') }}";
            });
        });

    </script>
@endsection
