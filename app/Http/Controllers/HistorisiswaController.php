<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historisiswa;
use App\Siswa;
use App\Semester;
use App\kelas;

class HistorisiswaController extends Controller
{
    public function indexHistori(Request $request)
    {
        $kelas = Kelas::all();
        $semester = Semester::all();
        $siswa = Siswa::all();
        $historisiswa = Historisiswa::all();
        return view('admin/histori/histori-siswa', compact('historisiswa'));
    }

    public function cetakForm()
    {
        return view('admin.histori.cetak-tanggalsiswa');
    }

    public function cetakHistoriPertanggal($tglawal, $tglakhir)
    {
           //dd([$tglawal, $tglakhir]);
           $tglawal = $tglawal;
           $tglakhir = $tglakhir;
           $cetakPerTanggal = Historisiswa::with('semester')->whereBetween('tglEfektif', [$tglawal, $tglakhir]);
           $pdf = PDF::loadview('admin/histori/cetak-data-pertanggal',compact('cetakPerTanggal', 'tglawal', 'tglakhir'));
        //    return view('admin/jadwal/cetak-data-pertanggal', compact('cetakPertanggal'));

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }
}
