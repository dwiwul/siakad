<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Pegawai;
use App\Kelas;
use App\Siswa;
use App\Jadwal;
use App\Nilai;
use App\Semester;
use App\Info;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function pilihKelas()
//     {
//         // $semester = Semester::all();
//         $kelas = Kelas::all();
//         return view('admin/siswa/pilihKelas', compact('kelas'));

//         }

    // public function index()
    // {
    //     $kelas = Kelas::all();
    //     $siswa = Siswa::all();
    //     $semester = Semester::all();
    //     $kelas7A = Siswa::where('idKelas', 1)->get();
    //     $kelas7B = Siswa::where('idKelas', 3)->get();
    //     $kelas8A = Siswa::where('idKelas', 4)->get();
    //     $kelas8B = Siswa::where('idKelas', 5)->get();
    //     $kelas9A = Siswa::where('idKelas', 6)->get();
    //     $kelas9B = Siswa::where('idKelas', 7)->get();
    //     // dd($kelas8A);
    //     return view("admin/siswa/index", compact('semester', 'kelas',  'siswa', 'kelas7A', 'kelas7B', 'kelas8A', 'kelas8B', 'kelas9A', 'kelas9B' ));
    // }

    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $semester = Semester::all();
        return view('admin/siswa/index', compact('siswa', 'kelas', 'semester'));
    }

    public function perTahunAjaran($year)
    {
        $siswa = Siswa::join('kelas', 'siswa.idKelas', 'kelas.idKelas')
        ->where('siswa.tahunAngkatan', $year)->select(
            'siswa.*',
            'kelas.namaKelas'
        )->get();

        return $siswa;
    }

    public function getTahunAjaran()
    {
        $siswa = collect(Siswa::select('tahunAngkatan')->get())->unique()->values()->all();

        return $siswa;
    }

    public function dashboard()
    {
        return view('siswa/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $semester = Semester::all();
        return view('admin/siswa/create', compact('kelas', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        toast('Data Berhasil Ditambahkan!','success');
        $request->validate([
            'nis' => 'required',
            'namaSiswa' => 'required',
            'idKelas' => 'required',
            'idSemester' => 'required',
            'telp' => 'required',
            'status' => 'required',
            ]);

            $siswa=new siswa;
            $siswa->nis = $request->nis;
            $siswa->idSemester = $request->idSemester;
            $siswa->namaSiswa = $request->namaSiswa;
            $siswa->idKelas = $request->idKelas;
            $siswa->tahunAngkatan = $request->tahunAngkatan;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->tmpLahir = $request->tmpLahir;
            $siswa->tglLahir = $request->tglLahir;
            $siswa->telp = $request->telp;
            $siswa->namaOrtu = $request->namaOrtu;
            $siswa->status = $request->status;
            $siswa->save();
            return redirect('admin/siswa/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::where('idSiswa', $id)->first();
        $semester = Semester::where('idSemester', $id)->get();
        $kelas = Kelas::where('idKelas', $id)->get();
        return view('admin/siswa/show', compact('siswa', 'kelas', 'semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idSiswa)
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $semester = Semester::all();
        $siswa = Siswa::where('idSiswa', $idSiswa)->first();
        return view('admin/siswa/edit', compact('kelas', 'semester', 'siswa', 'idSiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idSiswa, Request $request)
    {
        Alert::success('Data Berhasil Diubah', 'Success');
       Siswa::where('idSiswa', $idSiswa)
        ->update([
            'nis' => $request->nis,
            'namaSiswa' => $request->namaSiswa,
            'idSemester' => $request->idSemester,
            'idKelas' => $request->idKelas,
            'alamat' => $request->alamat,
            'tahunAngkatan' => $request->tahunAngkatan,
            'jk' => $request->jk,
            'tmpLahir' => $request->tmpLahir,
            'tglLahir' => $request->tglLahir,
            'telp' => $request->telp,
            'namaOrtu' => $request->namaOrtu,
            'status' => $request->status,
        ]);
        return redirect('admin/siswa/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        toast('Data Berhasil Dihapus!','success');
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('admin/siswa/index');
    }

    public function absensi()
    {
        $siswa = Siswa::all();
        return view('siswa.absen', compact('siswa'));
    }

    public function lihatJadwal()
    {
        $jadwal = Jadwal::all();
        return view('siswa/jadwal/lihat-jadwal', compact('jadwal'));
    }

    public function lihatNilai()
    {
        $nilai = Nilai::all();
        return view('siswa/lihat-nilai', compact('nilai'));
    }

    public function lihatInfo()
    {
        $info = Info::all();
        return view('siswa/lihat-pengumuman', compact('info'));
    }

    // public function cetakForm()
    // {
    //     return view('admin.Jadwal.cetak-jadwal');
    // }

    // public function cetakJadwalPertanggal($tglawal, $tglakhir)
    // {
    //        //dd([$tglawal, $tglakhir]);
    //        $tglawal = $tglawal;
    //        $tglakhir = $tglakhir;
    //        $cetakPerTanggal = Jadwal::with('semester')->whereBetween('tglEfektif', [$tglawal, $tglakhir]);
    //        $pdf = PDF::loadview('admin/jadwal/cetak-data-pertanggal',compact('cetakPerTanggal', 'tglawal', 'tglakhir'));
    //     //    return view('admin/jadwal/cetak-data-pertanggal', compact('cetakPertanggal'));

    //     $pdf->setPaper("a4", 'potrait');
    //     return $pdf->stream();
    // }

    public function cetakForm()
    {
        return view('admin/siswa/cetak-siswa');
    }

    public function cetakSiswa($tglawal, $tglakhir)
    {
        // dd($tglawal = $tglawal);
        $from   = Carbon::make($tglawal)->format('Y-m-d H:i:s');
        $to     = Carbon::make($tglakhir)->format('Y-m-d H:i:s');
        // $cetakPerTanggal = Siswa::with('semester')->whereBetween('tglMulai', [$tglawal, $tglakhir])->get();
        // return $cetakPerTanggal;

        # cek cara ini / comment dulu
        // $siswa = Siswa::with('semester')->where(function ($query) use ($tglawal, $tglakhir) {
        //     return $query->whereBetween('semester.tglMulai', [$tglawal, $tglakhir]);
        // })->get();
        # catatan  algorithma : ambil data siswa dengan semester  dengan eaager loading untuk mencegah N plus 1 query problem, dimana siswaa punya data semesternya,kemudian di constraint berdasar tgl mulai nya antara nilai date yang di berikan
        $siswa = Siswa::with('semester')->whereHas('semester', function ($query) use ($from, $to) {
            return $query->whereBetween('tglMulai', [$from, $to]);
        })->get();

        # setelah itu coba dump dulu buat ngelihat isinya sebelum di cetak ke pdf variable siswa nya.
        // dd($siswa); # comment here if the result is match your expectation.

        # kalo result nya sesuai tinggal komentari aja dd($siswa nya)
        // $cetakPerTanggal = $siswa = Siswa::with('semester')->get();

        // $pdf = PDF::loadview('admin/siswa/cetak-data-siswa',compact('cetakPerTanggal', 'tglawal', 'tglakhir'));
        $pdf = PDF::loadview('admin/siswa/cetak-data-siswa', compact('siswa', 'from', 'to'));

        $pdf->setPaper("a4", 'potrait');

        return $pdf->stream();
    }

    public function siswaexport()
    {
        return Excel::download(new SiswaExport,'siswa.xlsx');
    }

    public function siswaimportexcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new SiswaImport, $file);
        return redirect('admin/siswa/index');
    }


    public function beranda()
    {
        $siswa = DB::table('siswa')->count();
        $pegawai = DB::table('pegawai')->count();
        $info = DB::table('info')->count();
        return view('siswa/beranda')->with(compact ('siswa', 'pegawai', 'info'));
    }

}
