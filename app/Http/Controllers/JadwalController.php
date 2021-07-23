<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Semester;
use App\Hari;
use App\Kelas;
use App\Mapel;
use App\Guru;
use App\Pegawai;
use App\Ujian;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	// public function __construct()
    // {
    //     $this->middleware('pegawai');
    // }
    public function index()
    {
        $kelas = Kelas::all();
        // return view ('pegawai/jadwal/index', compact('kelas'));
        return view ('admin/jadwal/pilihKelas', compact('kelas'));
    }
    public function pilihSemester(Request $request, $id){
        // $semester = Semester::all();
        $request->session()->put('session_idKelas', $id);
        $semester = DB::table('semester')
        // ->join('jadwal', 'jadwal.idSemester', '=', 'semester.idSemester')
        // ->join('jadwal', 'jadwal.idKelas', '=', 'kelas.idKelas')
        ->select('semester.idSemester', 'semester.tglMulai', 'semester.tglSelesai', 'semester.keterangan', 'semester.tahunAjaran')
        ->orderBy('semester.tglMulai')
        ->orderBy('semester.tglSelesai')
        ->orderBy('semester.tahunAjaran')
        ->orderBy('semester.keterangan')
        // ->where('jadwal.idKelas', $request->session()->get('session_idKelas'))
        // ->groupBy('semester.idSemester')
        // ->groupBy('semester.tglEfektif')
        // ->groupBy('semester.keterangan')
        ->get();
        // ->join('jadwal', 'jadwal.idKelas', '=', 'kelas.idKelas')
        // ->join('jadwal', 'jadwal.idSemester', '=', 'semester.idSemester')
        // ->select('semester.*')
        // ->orderBy('semester.tglEfektif')
        // ->where('jadwal.idSemester', $request->session()->get('session_idSemester'))
        // ->get();
        // return view('pegawai/jadwal/pilihSemester', compact('semester', 'id'));
        return view('admin/jadwal/pilihSemester', compact('semester', 'id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        // echo $request->session()->get('session_idKelas');
        // exit;
        $mapel = Mapel::all();
        $jadwal = Jadwal::all();
        // $hari = Hari::all();
        $kelas = Kelas::all();
        $pegawai = Pegawai::all();
        $semester = Semester::all();
        // dd($id);
        // $sess_idKelas = $request->session()->get('session_idKelas');
        //$room = Room::where('id', $id)->get();
        // $jadwal_senin = Jadwal::where('idHari', 1)->get();
        // $jadwal_selasa = Jadwal::where('idHari', 2)->get();
        // $jadwal_rabu = Jadwal::where('idHari', 3)->get();
        // $jadwal_kamis = Jadwal::where('idHari', 4)->get();
        // $jadwal_jumat = Jadwal::where('idHari', 5)->get();
        $jadwal_senin = Jadwal::where('hari', 'Senin')->get();
        $jadwal_selasa = Jadwal::where('hari', 'Selasa')->get();
        $jadwal_rabu = Jadwal::where('hari', 'Rabu')->get();
        $jadwal_kamis = Jadwal::where('hari', 'Kamis')->get();
        $jadwal_jumat = Jadwal::where('hari', 'Jum`at')->get();
        $jadwal_sabtu = Jadwal::where('hari', 'Sabtu')->get();
        $jadwal_minggu = Jadwal::where('hari', 'Minggu')->get();
        // return view('pegawai/jadwal/create', compact('jadwal', 'mapel', 'kelas', 'guru', 'id', 'jadwal_senin', 'jadwal_selasa',
        // 'jadwal_rabu', 'jadwal_kamis', 'jadwal_jumat', 'semester'));
        return view('admin/jadwal/create', compact('jadwal', 'mapel', 'kelas', 'pegawai', 'id', 'jadwal_senin', 'jadwal_selasa',
        'jadwal_rabu', 'jadwal_kamis', 'jadwal_jumat', 'jadwal_sabtu', 'jadwal_minggu', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'idHari' => 'required',
            'jamMulai' => 'required',
            'jamSelesai' => 'required',
            'idMapel' => 'required',
            'idPegawai' => 'required',
            'hari' => 'required'
        ]);

        $cek_jadwal=new jadwal;
        $cek_jadwal = Jadwal::where('idMapel', $request->idMapel)
        ->where('idKelas', $request->session()->get('session_idKelas'))
        ->where('idSemester', $request->session()->get('session_idSemester'))
        ->get();

        // echo json_encode($jadwal);
        // echo "<br/>".count($jadwal);
        // exit;
        $jadwal=new jadwal;
        $jadwal->idSemester = $request->session()->get('session_idSemester');
        // $jadwal->idHari = $request->idHari;
        $jadwal->hari = $request->hari;
        // $jadwal->idHari = $request->session()->get('session_idHari');
        $jadwal->jamMulai = date('H:i', strtotime($request->jamMulai));
        $jadwal->jamSelesai = date('H:i', strtotime($request->jamSelesai));
        $jadwal->idMapel = $request->idMapel;
        $jadwal->idKelas = $request->session()->get('session_idKelas');
        $jadwal->idPegawai = $request->idPegawai;

        if(count($cek_jadwal)>0){
            //kalau jadwal sudah ada, maka cek dulu gurunya
            foreach($cek_jadwal as $data){
                if($request->idPegawai==$data->idPegawai){
                    //lanjut
                    $jadwal->save();
                }else{
                    //guru tidak boleh berbeda, flash message
                    return redirect('admin/jadwal/show/'.$request->session()->get('session_idKelas').'/'.$request->session()->get('session_idSemester'))->with('create', 'Guru tidak sama!');
                    // return redirect('pegawai/jadwal/index/'.$request->idJadwal)->with('create', 'Guru tidak sama!');
                }
            }
        }else{
            //kalau jadwal belum ada, langsung bisa simpan
            $jadwal->save();
        }
        // dd($jadwal->save());
        // echo $jadwal->toSql();
        // dd(DB::getQueryLog());
        // exit;
        // return redirect('pegawai/jadwal/index/'.$request->idJadwal)->with('toast_success', 'Mapel Berhasil Ditambahkan!');
        // return redirect('pegawai/jadwal/show/'.$request->session()->get('session_idKelas').'/'.$request->session()->get('session_idSemester'))->with('toast_success', 'Mapel Berhasil Ditambahkan!');
        return redirect('admin/jadwal/show/'.$request->session()->get('session_idKelas').'/'.$request->session()->get('session_idSemester'))->with('toast_success', 'Mapel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $idKelas, $id)
    {
        // $semester_aktif = $request->session()->get('session_semester_aktif');
        // $request->session()->put('session_idKelas',$id);
        $request->session()->put('session_idSemester',$id);
        $kelas = Kelas::where('idKelas', $idKelas)->get();
        $jadwal = Jadwal::where('idSemester',$id)->get();
        // $dtJadwal = Jadwal::where('hari', 'Senin')->get();
        // $jadwal_senin = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('idHari', 1)->get();
        // $jadwal_selasa = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('idHari', 2)->get();
        // $jadwal_rabu = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('idHari', 3)->get();
        // $jadwal_kamis = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('idHari', 4)->get();
        // $jadwal_jumat = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('idHari', 5)->get();
        $jadwal_senin = Jadwal::where('idSemester', $id)->where('idKelas', $idKelas)->where('hari', 'Senin')->get();
        $jadwal_selasa = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('hari', 'Selasa')->get();
        $jadwal_rabu = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('hari', 'Rabu')->get();
        $jadwal_kamis = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('hari', 'Kamis')->get();
        $jadwal_jumat = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('hari', 'Jum`at')->get();
        $jadwal_sabtu = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('hari', 'Sabtu')->get();
        $jadwal_minggu = Jadwal::where('idSemester',$id)->where('idKelas', $idKelas)->where('hari', 'Minggu')->get();
        // return view('pegawai/jadwal/show', compact('jadwal', 'jadwal_senin', 'jadwal_selasa',
        // 'jadwal_rabu', 'jadwal_kamis', 'jadwal_jumat', 'id'));
        return view('admin/jadwal/show', compact('jadwal', 'jadwal_senin', 'jadwal_selasa',
        'jadwal_rabu', 'jadwal_kamis', 'jadwal_jumat', 'jadwal_sabtu', 'jadwal_minggu', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $idJadwal = $id;
        $jadwal = Jadwal::where('idJadwal', $id)->first();

        // $jadwal_senin = Jadwal::where('idKelas',$id)->where('idHari', 1)->get();
        // $jadwal_selasa = Jadwal::where('idKelas',$id)->where('idHari', 2)->get();
        // $hari = Hari::all();
        $mapel = Mapel::all();
        $pegawai = Pegawai::all();
        // return view('pegawai/jadwal/edit', compact('id','jadwal', 'mapel', 'guru'));
        return view('admin/jadwal/edit', compact('id','jadwal', 'mapel', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cek = Jadwal::where('idJadwal',$id)->get();
        // echo json_encode($cek);
        $request->all();
        // echo json_encode($request->idGuru);
        // echo "<br/>idguru=".$request->idGuru."<br/>idmapel=".$request->idMapel."<br/>";
        // exit;
        foreach($cek as $data){
            // echo json_encode($data)."<br/>";
            if($data->idPegawai!=$request->idPegawai || $data->idMapel!=$request->idMapel){
                // echo "guru ganti";
                Jadwal::where('idMapel', $request->idMapel)
                ->where('idSemester',$request->session()->get('session_idSemester'))
                ->where('idKelas',$request->session()->get('session_idKelas'))
                ->update([
                    'idPegawai' => $request->idPegawai,
                ]);
            }
        }
        // exit;
        Jadwal::where('idJadwal', $id)
                ->update([
                    // 'idHari' => $request->idHari,
                    'hari' => $request->hari,
                    'idKelas' => $request->session()->get('session_idKelas'),
                    'idSemester' => $request->session()->get('session_idSemester'),
                    'idPegawai' => $request->idPegawai,
                    'idMapel' => $request->idMapel,
                    'jamMulai' => date('H:i', strtotime($request->jamMulai)),
                    'jamSelesai' => date('H:i', strtotime($request->jamSelesai)),
                ]);
        return redirect('admin/jadwal/show/'.$request->session()->get('session_idKelas').'/'.$request->session()->get('session_idSemester'))->with('toast_info', 'Data Berhasil Diubah!');
        // return redirect('pegawai/jadwal/show/'.$request->session()->get('session_idKelas'))->with('toast_info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        return redirect()->back()->with('toast_warning', 'Data Berhasi Dihapus');
    }
}
