<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Guru;
use App\Nilai;
use App\Kelas;
use App\Absensi;
use App\Jadwal;
use App\User;
use App\Siswa;



class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $users = DB::table('users')->get();
        $data = ['guru' => $guru, 'users' => $users];
        return view("admin.guru.index", compact('data'));
    }

    public function dashboard()
    {
        return view('guru/dashboard');
    }

    // public function beranda()
    // {
    //     $jumlah_siswa = Siswa::all()->count();
    //     return view('guru/beranda')->with('jumlah_siswa',  $jumlah_siswa);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guru($idGuru)
    {
        $guru = Guru::find($idGuru);
        return view('guru.show', compact('guru'));

        return view('admin.guru.index')->with('guru',$idGuru);
    }

    public function create()
    {
        $users = User::where('level', 'Guru')->get();
        return view("admin.guru.create", compact('users'));

    }
    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->idUsers = $request->get("idUsers");
        $guru->nip = $request->get("nip");
        $guru->nama_guru = $request->get("nama_guru");
        $guru->jk = $request->get("jk");
        $guru->tmp_lahir = $request->get("tmp_lahir");
        $guru->tgl_lahir = $request->get("tgl_lahir");
        $guru->alamat = $request->get("alamat");
        $guru->telp = $request->get("telp");
        $guru->save();
        $guru = Guru::all();
        return redirect('guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idGuru)
    {
        $guru = Guru::where('id', $idGuru)->first();
        return view('admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idGuru)
    {
        $guru = Guru::findOrFail($idGuru);
        $users = User::all();
        return view("admin.guru.edit", compact('users', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idGuru)
    {
        $guru = Guru::findOrFail($idGuru);
        $guru->idUsers = $request->get('idUsers');
        $guru->nip = $request->get("nip");
        $guru->nama_guru = $request->get("nama_guru");
        $guru->jk = $request->get("jk");
        $guru->tmp_lahir = $request->get("tmp_lahir");
        $guru->tgl_lahir = $request->get("tgl_lahir");
        $guru->alamat = $request->get("alamat");
        $guru->telp = $request->get("telp");
        $guru->save();
        return redirect('guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idGuru)
    {
        $guru = Guru::find($idGuru);
        if(!$guru) {
            return redirect('guru');
        }
        $guru->delete();
        return redirect('guru');
    }

    public function absensi()
    {
        $guru = Guru::all();
        return view('guru.absen', compact('guru'));
    }
}
