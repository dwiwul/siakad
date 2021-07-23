@extends('sbadmin/kepsek_master')
@section('title', 'Users')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

    <form action="{{ route('users.update', $users->idUsers)}}" method="POST">
        @csrf
        @method('PUT')
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
                    <label for="password_2">Password</label>
                    <input type="password" id="password_2" name="password_2" value="{{$users->password_2}}" class="form-control @error('password_2') is-invalid @enderror">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{('admin/users/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

