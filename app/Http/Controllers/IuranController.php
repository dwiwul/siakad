<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Siswa;
use App\Kelas;
use App\Semester;
use App\User;
use App\Iuran;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\IuranExport;
use App\Imports\IuranImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $semester = Semester::all();
        $kelas = Kelas::all();
        $iuran = Iuran::all();
        return view("admin/iuran/index", compact('kelas', 'semester', 'siswa', 'iuran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $semester = Semester::all();
        $kelas = Kelas::all();
        $iuran = Iuran::all();
        return view("admin/iuran/index", compact('kelas', 'semester', 'siswa', 'iuran'));
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
        $iuran= new iuran();
        $iuran->idSiswa = $request->idSiswa;
        $iuran->idKelas = $request->idKelas;
        $iuran->idSemester = $request->idSemester;
        $iuran->tgl = $request->tgl;
        $iuran->jenisBayar = $request->jenisBayar;
        $iuran->jumlahBayar = $request->jumlahBayar;
        $iuran->save();
        return redirect('admin/iuran/index');
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
    public function edit($id)
    {
        $siswa = Siswa::all();
        $semester = Semester::all();
        $kelas = Kelas::all();
        $iuran = Iuran::where('idIuran', $id)->first();
        return view('admin/iuran/edit', compact('iuran', 'siswa', 'id', 'kelas', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        toast('Data Berhasil Diubah!','success');
        $iuran = Iuran::findOrFail($id);
        $iuran->idSiswa = $request->get("idSiswa");
        $iuran->idSemester = $request->get("idSemester");
        $iuran->idKelas = $request->get("idKelas");
        $iuran->tgl = $request->get("tgl");
        $iuran->jenisBayar = $request->get("jenisBayar");
        $iuran->jumlahBayar = $request->get("jumlahBayar");
        $iuran->save();
        return redirect('admin/iuran/index');
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
        $iuran = iuran::find($id);
        $iuran->delete();
        return redirect('admin/iuran/index');
    }

    public function cetakForm()
    {
        return view('admin/iuran/index');
    }

    public function cetakIuran($tglawal, $tglakhir)
    {
        $tglawal = $tglawal;
        $tglakhir = $tglakhir;
        $cetakPerTanggal = Iuran::whereBetween('tgl', [$tglawal, $tglakhir])
        ->get();
        $pdf = PDF::loadview('admin/iuran/cetak-data-iuran',compact('cetakPerTanggal', 'tglawal', 'tglakhir'));
        // dd($cetakPerTanggal);

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }
}
