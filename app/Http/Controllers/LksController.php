<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Siswa;
use App\Kelas;
use App\Semester;
use App\User;
use App\Lks;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\LksExport;
use App\Imports\LksImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LksController extends Controller
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
        $lks = Lks::all();
        return view("admin/lks/index", compact('kelas', 'semester', 'siswa', 'lks'));
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
        $lks = Lks::all();
        return view("admin/lks/index", compact('kelas', 'semester', 'siswa', 'lks'));
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
        $lks= new lks();
        $lks->idSiswa = $request->idSiswa;
        $lks->idKelas = $request->idKelas;
        $lks->idSemester = $request->idSemester;
        $lks->tgl = $request->tgl;
        $lks->jenisBayar = $request->jenisBayar;
        $lks->jumlahBayar = $request->jumlahBayar;
        $lks->save();
        return redirect('admin/lks/index');
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
        $lks = Lks::where('idLks', $id)->first();
        return view('admin/lks/edit', compact('lks', 'siswa', 'id', 'kelas', 'semester'));
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
        Alert::success('Data Berhasil Diubah', 'Success');
        $lks = Lks::findOrFail($id);
        $lks->idSiswa = $request->get("idSiswa");
        $lks->idSemester = $request->get("idSemester");
        $lks->idKelas = $request->get("idKelas");
        $lks->tgl = $request->get("tgl");
        $lks->jenisBayar = $request->get("jenisBayar");
        $lks->jumlahBayar = $request->get("jumlahBayar");
        $lks->save();
        return redirect('admin/lks/index');
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
        $lks = lks::find($id);
        $lks->delete();
        return redirect('admin/lks/index');
    }

    public function cetakLks($tglawal, $tglakhir)
    {
        $tglawal = $tglawal;
        $tglakhir = $tglakhir;
        $cetakPerTanggal = Lks::whereBetween('tgl', [$tglawal, $tglakhir])
        ->get();
        $pdf = PDF::loadview('admin/lks/cetak-data-lks',compact('cetakPerTanggal', 'tglawal', 'tglakhir'));
        // dd($cetakPerTanggal);

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }
}
