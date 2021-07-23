<?php

namespace App\Http\Controllers;
use App\Pegawai;
use App\Users;
use App\Siswa;
use App\PetugasTU;
use DB;
use PDF;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class PetugasTUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugastu = PetugasTU::all();
        return view('admin/petugasTU/index', compact('petugastu'));
    }

    public function create(){
        $petugastu = PetugasTU::all();
        return view('admin/petugasTU/create', compact('petugastu'));
    }

    public function store(Request $request)
    {
        toast('Data Berhasil Ditambahkan!','success');
        $request->validate([
            'namaTU' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        $petugastu = new petugastu;
        $petugastu->namaTU   = $request->namaTU;
        $petugastu->jk       = $request->jk;
        $petugastu->alamat   = $request->alamat;
        $petugastu->telp     = $request->telp;
        $petugastu->save();
        return redirect('admin/petugasTU/index');
    }

    public function edit($idTU){
        $petugastu = PetugasTU::where('idTU', $idTU)->first();
        return view('admin/petugasTU/edit', compact('petugastu', 'idTU'));
    }

    public function update(Request $request, $idTU)
    {
        toast('Data Berhasil Diubah!','success');
        PetugasTU::where('idTU', $idTU)
        ->update([
            'namaTU' => $request->namaTU,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);
        return redirect('admin/petugasTU/index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show($id)
    {
        $petugastu = PetugasTU::find($id);
        return view('admin/petugasTU/show', compact('petugastu'));
    }

    public function destroy($id)
    {
        $petugastu = PetugasTU::find($id);
        $petugastu->delete();
        toast('Data Berhasil Dihapus!','success');
        return redirect('admin/petugasTU/index');

    }

    public function cetakPegawai()
    {
        //dd([$tglawal, $tglakhir]);

        $petugastu = PetugasTU::all();
        $pdf = PDF::loadview('admin/petugasTU/cetak-data-petugasTU',['petugasTU'=>$petugastu]);
        // return view('kepsek.Pegawai.cetak-data-pegawai', compact('cetakPegawai'));

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }

    // public function pegawaiexport()
    // {
    //     return Excel::download(new PegawaiExport,'pegawai.xlsx');
    // }

    // public function pegawaiimportexcel(Request $request)
    // {
    //     $file = $request->file('file');
    //     Excel::import(new PegawaiImport, $file);
    //     return redirect('admin/petugasTA/index');
    // }

    // public function absensi()
    // {
    //     $pegawai = Pegawai::all();
    //     return view('pegawai.absen', compact('pegawai'));
    // }

    // public function lihatSiswa()
    // {
    //     $siswa = Siswa::all();
    //     return view('guru/lihat-siswa', compact('siswa'));
    // }

}
