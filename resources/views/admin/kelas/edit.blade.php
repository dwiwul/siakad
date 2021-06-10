@extends('sbadmin/master')
@section('title', 'kelas')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Guru</h1>
    </div>
    <div class="card-body">

        <form action="{{url('admin/kelas/'.$id)}}" method="POST">
            @method('patch')
            @csrf
            <div class="container">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" value="{{$kelas->nama_kelas}}" class="form-control" id="nama_kelas" name="nama_kelas">
                        @error('nama_kelas')
                            <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{url('admin/kelas/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
    </div>
</div>
@endsection

