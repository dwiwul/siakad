@extends('sbadmin/master')
@section('title', 'kelas')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Kelas</h1>
        </div>
        <div class="card-body">
             <form action="{{url('admin/kelas')}}" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="namaKelas">Nama Kelas</label>
                    <input type="text" class="form-control" id="namaKelas" name="namaKelas">
                    @error('namaKelas')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{url('admin/kelas/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


