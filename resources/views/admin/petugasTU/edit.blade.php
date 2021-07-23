@extends('sbadmin/master')
@section('title', 'petugastu')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Petugas TU</h1>
    </div>
    <div class="card-body">
        <form action="{{url('admin/petugasTU/'.$idTU)}}" method="POST">
                @method('patch')
                @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaTU">Petugas TU</label>
                                <input type="text" class="form-control" id="namaTU" name="namaTU" value="{{$petugastu->namaTU}}">
                                @error('namaTU')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                    <select value="{{$petugastu->jk}}" class="form-control" name="jk" id="jk">
                                        {{-- <option>--Pilihan--</option> --}}
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                            </div>
                        </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$petugastu->alamat}}">
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telp">HP</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="{{$petugastu->telp}}">
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('admin/petugasTU/index')}}" class="btn btn-secondary ">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
