@extends('sbadmin/master')
@section('title', 'semester')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">EDIT DATA</h1>
    </div>
    <div class="card-body">

        <form action="{{url('admin/semester/'.$id)}}" method="POST">
            @method('patch')
            @csrf
            <div class="container">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tahunAjaran">Tahun Ajaran</label>
                        <input type="text" value="{{$semester->tahunAjaran}}" class="form-control" id="tahunAjaran" name="tahunAjaran">
                        @error('tahunAjaran')
                            <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tglMulai">Tgl Mulai</label>
                        <input type="date" value="{{$semester->tglMulai}}" class="form-control" id="tglMulai" name="tglMulai">
                        @error('tglMulai')
                            <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tglSelesai">Tgl Selesai</label>
                        <input type="date" value="{{$semester->tglSelesai}}" class="form-control" id="tglSelesai" name="tglSelesai">
                        @error('tglSelesai')
                            <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="keterangan">Semester</label>
                        <select class="form-control" name="keterangan" id="keterangan">
                            <option>--Pilihan--</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{url('admin/semester/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
    </div>
</div>
@endsection

