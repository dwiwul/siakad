<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guru;
use App\Siswa;
use App\Mapel;
use App\Kelas;
use App\Pegawai;
use App\Kepsek;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $pegawai = Pegawai::all();
        $kepsek = Kepsek::all();
        $siswa = Siswa::all();
        return view('kepsek/users/index',compact('users','pegawai', 'siswa', 'kepsek'));
    }
    //protected function validator(array $data)
    //{
    // return Validator::make($data, [
    //'username' => 'required|string|username|max:255|unique::users',
    //'password' => 'required|min:6|confirmed',
    //'level' => 'required',
    //]);
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $pegawai= Pegawai::all();
        return view('kepsek/users/create', compact('siswa', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all);
        toast('Data Berhasil Ditambahkan!','success');
        $users = new User();
        $users->username = $request->get("username");
        $users->password = bcrypt($request->get("password"));
        $users->level = $request->get("level");
        $users->save();
        $users = User::all();
        return view("admin.users.index", ["users" => $users]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idUsers)
    {
        $siswa = Siswa::all();
        $pegawai = Pegawai::all();
        $kepsek = Kepsek::all();
        $users = User::where('idUsers', $idUsers)->first();
        return view('kepsek/users/edit', compact('users', 'siswa', 'pegawai', 'kepsek', 'idUsers'));
    }

    public function editProfile()
    {
        // return Auth::login();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUsers)
    {
        toast('Data Berhasil Diubah!','success');
        $users = User::findOrFail($idUsers);
        $users->username = $request->get("username");
        $users->password = bcrypt($request->get("password"));
        $users->level = $request->get("level");
        $users->save();
        return redirect("kepsek/users/index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUsers)
    {
        toast('Data Berhasil Dihapus!','success');
        $users = user::find($idUsers);
        if (!$users) {
            return redirect()->back();
        }
        $users->delete();
        return redirect('users');
    }

    // public function profile()
    // {
    //     $data = [];
    //     //return session('level');
    //     if (session('level') == 'Pegawai') {
    //         $data = Guru::where('idPegawai', session('idPegawai'))->first();
    //         // return $data;
    //         return view('user.profile_guru', compact('data'));
    //     } else if(session('level') == 'Siswa'){
    //         $data = Siswa::where('idSiswa', session('idSiswa'))->first();
    //         // return $data;
    //         return view('user.profile_siswa', compact('data'));
    //     } else if(session('level') == 'Kepsek'){
    //         $data = Kepsek::where('idKepsek', session('idKepsek'))->first();
    //         // return $data;
    //         return view('user.profile_kepsek', compact('data'));
    //     }else{
    //         $data = user::where('idUsers', session('idUsers'))->first();
    //         // return $data;
    //         return view('user.profile', compact('data'));
    //     }
    //     return session('level');
    // }

    public function profile()
    {
        $data = [];
        // return session('id');
        if (session('level') == 'Pegawai') {
            $data = Guru::where('idPegawai', session('id'))->first();
            // return $data;
            return view('user.profile', compact('data'));
        } else if(session('level') == 'Siswa'){
            $data = Siswa::where('idSiswa', session('id'))->first();
            // return $data;
            return view('user.profile', compact('data'));
        } else if(session('level') == 'Kepsek'){
            $data = Kepsek::where('idKepsek', session('id'))->first();
            // return $data;
            return view('user.profile', compact('data'));
        }else{
            $data = user::where('idUsers', session('idUsers'))->first();
            // return $data;
            return view('user.profile', compact('data'));
        }
        return session('level');
    }

    public function updateProfile(Request $request)
    {
        toast('Data Berhasil Diupdate!','success');
        if ($request['password'] != null) {
            $in['password'] = bcrypt($request['password']);
        }
        $in['username'] = $request['username'];
        try {
            User::where('idUsers', session('id'))->update($in);
            return redirect('/profile');
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
        // return $request;
    }

    public function updateProfileGuru(Request $request)
    {
        // return $request;
        toast('Data Berhasil Diupdate!','success');
        $in['namaPegawai'] = $request['namaPegawai'];
        $in['jk'] = $request['jk'];
        $in['tmpLahir'] = $request['tmpLahir'];
        $in['tglLahir'] = $request['tglLahir'];
        $in['alamat'] = $request['alamat'];
        $in['telp'] = $request['telp'];
        Guru::where('idPegawai', session('id'))->update($in);
        return redirect('/profile');
    }

    public function updateProfileKepsek(Request $request)
    {
        // return $request;
        toast('Data Berhasil Diupdate!','success');
        $in['namaKepsek'] = $request['namaKepsek'];
        $in['alamat'] = $request['alamat'];
        $in['telp'] = $request['telp'];
        Kepsek::where('idKepsek', session('id'))->update($in);
        return redirect('/profile');
    }

    public function updateProfileSiswa(Request $request)
    {
        // return $request;
    toast('Data Berhasil Diupdate!','success');
       $in['namaSiswa'] = $request['namaSiswa'];
       $in['tahunAngkatan'] = $request['tahunAngkatan'];
       $in['jk'] = $request['jk'];
       $in['tmpLahir'] = $request['tmpLahir'];
       $in['tglLahir'] = $request['tglLahir'];
       $in['alamat'] = $request['alamat'];
       $in['telp'] = $request['telp'];
       $in['nis'] = $request['nis'];
       Siswa::where('idSiswa', session('id'))->update($in);
       return redirect('/profile');
   }
}
