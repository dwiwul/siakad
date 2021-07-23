<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pegawai;
use App\Siswa;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request  $request)
    {
        // return session('level');
        // return 'gagal';
        $cek = Auth::login(User::find(session('idUsers')));
        // return $cek;
        if ($cek) {
            return redirect('/login')->with('message', 'Session berakhir!');
        }else {
            if (session('level') == "Admin") {
                return redirect('admin/beranda');
        } else if (session('level') == "Pegawai") {
             return redirect('guru/beranda');
            //     $kelas = DB::table('kelas')
            // ->join('jadwal', 'jadwal.idKelas', '=', 'kelas.idKelas')
            // ->join('mapel', 'jadwal.idMapel', '=', 'mapel.idMapel')
            // // ->join('semester', 'jadwal.idSemester', '=', 'semester.idSemester')
            // ->select('kelas.idKelas', 'kelas.namaKelas', 'mapel.idMapel', 'mapel.namaMapel')
            // ->orderBy('kelas.namaKelas')
            // ->where('jadwal.idPegawai', $request->session()->get('session_idPegawai'))
            // // ->where('jadwal.idMapel', $request->session()->get('session_idMapel'))
            // ->groupBy('kelas.idKelas')
            // ->groupBy('kelas.namaKelas')
            // ->groupBy('mapel.namaMapel')
            // ->groupBy('mapel.idMapel')
            // ->get();

            } else if (session('level') == "Siswa") {
                return redirect('siswa/beranda');
            } else if (session('level') == "Kepsek") {
                return redirect('kepsek/beranda');
            }
        }
    }

    public function dashboard()
    {
        $siswa = DB::table('siswa')->count();
        $pegawai = DB::table('pegawai')->count();
        $info = DB::table('info')->count();
        return view('admin/dashboard')->with(compact ('siswa', 'pegawai', 'info'));
    }


}
