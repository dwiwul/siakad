@extends('sbadmin/kepsek_master')
@section('title', 'Users')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    </div>
    <div class="card-body">
    <form action="{{url('kepsek/users/'.$idUsers)}}" method="POST">
        @csrf
        @method('patch')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{$users->username}}" class="form-control @error('username') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <div class="col-sm-4">
                        <select name="level" id="level" value="{{$users->level}}" class="form-control" required="true">
                            <option value='Admin'>Admin</option>
                            <option value='Guru'>Guru</option>
                            <option value='Siswa'>Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="{{$users->password}}" class="form-control @error('password') is-invalid @enderror">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ url('kepsek/users/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

