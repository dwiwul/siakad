@extends('sbadmin/master')
@section('title', 'mapel')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Data</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/mapel/'.$mapel->idMapel)}}" method="POST">
                @method('patch')
                @csrf
                <div class="container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaMapel">Nama Mapel</label>
                            <input type="text" id=" namaMapel" name=" namaMapel" value="{{$mapel-> namaMapel}}" class="form-control @error(' namaMapel') is-invalid @enderror">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{url('admin/mapel/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
        </div>
    </div>
@endsection
