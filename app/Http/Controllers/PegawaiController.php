<?php

namespace App\Http\Controllers;
use App\Pegawai;
use App\Users;
use App\Siswa;
use App\Kepsek;
use App\PetugasTU;
use App\Info;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PegawaiController extends Controller
{
    // public function dashboard()
    // {
    //     return view('guru/dashboard');
    // }

    public function index()
    {
        $pegawai = Pegawai::all();
        return view('kepsek/pegawai/index', compact('pegawai'));
    }

    public function create(){
        $pegawai = Pegawai::all();
        return view('kepsek/pegawai/create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        toast('Data Berhasil Ditambahkan!','success');
        $request->validate([
            'namaPegawai' => 'required',
            'jk' => 'required',
            'nip' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'status' => 'required',
        ]);

        $pegawai = new pegawai;
        $pegawai->nip           = $request->nip;
        $pegawai->namaPegawai   = $request->namaPegawai;
        $pegawai->jk            = $request->jk;
        $pegawai->tmpLahir      = $request->tmpLahir;
        $pegawai->tglLahir      = $request->tglLahir;
        $pegawai->alamat        = $request->alamat;
        $pegawai->telp          = $request->telp;
        $pegawai->status        = $request->status;
        $pegawai->save();

        return redirect('kepsek/pegawai/index');
    }

    public function edit($idPegawai){
        $pegawai = Pegawai::where('idPegawai', $idPegawai)->first();
        return view('kepsek/pegawai/edit', compact('pegawai', 'idPegawai'));
    }

    public function update(Request $request, $idPegawai)
    {
        toast('Data Berhasil Diubah!','success');
        Pegawai::where('idPegawai', $idPegawai)
        ->update([
            'nip' => $request->nip,
            'namaPegawai' => $request->namaPegawai,
            'jk' => $request->jk,
            'tmpLahir' => $request->tmpLahir,
            'tglLahir' => $request->tglLahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'status' => $request->status,
        ]);
        return redirect('kepsek/pegawai/index');
    }

    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return view('kepsek/pegawai/show', compact('pegawai'));
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        toast('Data Berhasil Dihapus!','success');
        return redirect('kepsek/pegawai/index');

    }

    public function cetakPegawai()
    {
        //dd([$tglawal, $tglakhir]);

        $pegawai = Pegawai::all();
        $pdf = PDF::loadview('kepsek/pegawai/cetak-data-pegawai',['pegawai'=>$pegawai]);
        // return view('kepsek.Pegawai.cetak-data-pegawai', compact('cetakPegawai'));

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }

    public function pegawaiexport()
    {
        return Excel::download(new PegawaiExport,'pegawai.xlsx');
    }

    public function pegawaiimportexcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PegawaiImport, $file);
        return redirect('kepsek/pegawai/index');
    }

    public function absensi()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.absen', compact('pegawai'));
    }

    public function lihatSiswa()
    {
        $siswa = Siswa::all();
        return view('guru/lihat-siswa', compact('siswa'));
    }

    public function lihatTU()
    {
        $petugastu = PetugasTU::all();
        return view('guru/lihat-TU', compact('petugastu'));
    }

    public function lihatInfo()
    {
        $info = Info::all();
        return view('guru/lihat-info', compact('info'));
    }

    // public function beranda()
    // {
    //     return view('guru/beranda');
    // }

    public function beranda()
    {
        $siswa = DB::table('siswa')->count();
        $pegawai = DB::table('pegawai')->count();
        $info = DB::table('info')->count();
        return view('guru/beranda')->with(compact ('siswa', 'pegawai', 'info'));
    }


}
