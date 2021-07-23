@extends('sbadmin/master')
@section('title', 'detail bayar')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Jenis Pembayaran</h1>
    </div>
    <div class="card-body">

        <form action="{{url('admin/bayar/'.$id)}}" method="POST">
            @method('patch')
            @csrf
            <div class="container">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenisBayar">Nama Kelas</label>
                        <input type="text" value="{{$detailbayar->jenisBayar}}" class="form-control" id="jenisBayar" name="jenisBayar">
                        @error('jenisBayar')
                            <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{url('admin/bayar/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
    </div>
</div>
@endsection

