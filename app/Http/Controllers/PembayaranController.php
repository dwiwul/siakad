<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Siswa;
use App\Kelas;
use App\Semester;
use App\User;
use App\Spp;
use App\Pembayaran;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Bayar;
use App\Exports\PembayaranExport;
use App\Imports\PembayaranImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
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
        $detailbayar = Bayar::all();
        $kelas = Kelas::all();
        $pembayaran = Pembayaran::all();
        return view("admin.pembayaran.index", compact('kelas', 'semester', 'siswa', 'detailbayar', 'pembayaran'));
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
        $detailbayar = Bayar::all();
        $kelas = Kelas::all();
        $pembayaran = Pembayaran::all();
        return view("admin.pembayaran.index", compact('kelas', 'semester', 'siswa', 'detailbayar', 'pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $pembayaran= new pembayaran();
            $pembayaran->idSiswa = $request->idSiswa;
            $pembayaran->idKelas = $request->idKelas;
            $pembayaran->idSemester = $request->idSemester;
            $pembayaran->idBayar = $request->idBayar;
            $pembayaran->tgl = $request->tgl;
            $pembayaran->jumlahBayar = $request->jumlahBayar;
            $pembayaran->save();
            return redirect('admin/pembayaran/index');
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
        $detailbayar = Bayar::all();
        $kelas = Kelas::all();
        $pembayaran = Pembayaran::where('idPembayaran', $id)->first();
        return view('admin/pembayaran/edit', compact('pembayaran', 'siswa', 'id', 'kelas', 'semester', 'detailbayar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($idPembayaran);
        $pembayaran->idSiswa = $request->get("idSiswa");
        $pembayaran->idSemester = $request->get("idSemester");
        $pembayaran->idKelas = $request->get("idKelas");
        $pembayaran->idBayar = $request->get("idBayar");
        $pembayaran->tgl = $request->get("tgl");
        $pembayaran->jumlahBayar = $request->get("jumlahBayar");
        $pembayaran->save();
        return redirect('admin/pembayaran/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = pembayaran::find($id);
        $pembayaran->delete();
        return redirect('admin/pembayaran/index');
    }

    public function cetakPembayaran()
    {
        //dd([$tglawal, $tglakhir]);

        $pembayaran = Pembayaran::all();
        $pdf = PDF::loadview('admin/pembayaran/cetak-data-pembayaran',['pembayaran'=>$pembayaran]);
        // return view('admin.Pembayaran.cetak-data-pembayaran', compact('cetakPembayaran'));

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }

    public function pembayaranimportexcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PembayaranImport, $file);
        return redirect('kepsek/pembayaran/index');
    }

}
