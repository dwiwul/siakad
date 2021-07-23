<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\UserInterface;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Kepsek;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class login extends Controller
{
    function Login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $cek = User::where('username', $request['username'])->first();

        if ($cek) {
            if (password_verify($request->password, $cek->password)) {
                session()->put('status', true);
                session()->put('username', $cek->username);
                session()->put('level', $cek->level);
                session()->put('idUsers', $cek->idUsers);
                Auth::login(User::find($cek->idUsers));
                if ($cek->level == 'Admin') {
                    session()->put('id', $cek->idUsers);
                } else if ($cek->level == 'Pegawai') {
                    session()->put('id', $cek->idPegawai);

                } else if ($cek->level == 'Siswa') {
                    session()->put('id', $cek->idSiswa);

                } else if ($cek->level == 'Kepsek') {
                    session()->put('id', $cek->idKepsek);
                }

                return redirect('/home');
            } else {

                return redirect('/login')->with('message', 'Password salah!');
            }
        } else {

            return redirect('/login')->with('message', 'Username tidak ditemukan!');
        }
    }

    public function loginPage()
    {
        if (Auth::check()) {
            $authUser = Auth::user();
            switch ($authUser->level) {
                case 'Kepsek':
                    return redirect('kepsek/pegawai/index');
                    break;

                default:
                    # code...
                    break;
            }
        }

        return view('auth.login')->with('message', 'Logout!');
    }
}
