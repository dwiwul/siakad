<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kepsek;
use App\Pegawai;
use App\Users;
use App\Siswa;
use App\Info;
use App\PetugasTU;
use PDF;
use App\Http\Controllers\Auth;
use App\Imports\PegawaiImport;
use App\Imports\TUImport;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class KepsekController extends Controller
{
    public function dashboard()
    {
        return view('kepsek/dashboard');
    }

    public function beranda()
    {
        $pegawai = DB::table('pegawai')->count();
        $siswa = DB::table('siswa')->count();
        $info = DB::table('info')->count();
        return view('kepsek/beranda')->with(compact('pegawai', 'siswa', 'info'));
    }

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
            toast('Data Berhasil Ditambahkan!','success');
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

        public function pegawaiimportexcel(Request $request)
        {
            $file = $request->file('file');
            Excel::import(new PegawaiImport, $file);
            return redirect('kepsek/pegawai/index');
        }

        public function tuimportexcel(Request $request)
        {
            $file = $request->file('file');
            Excel::import(new TUImport, $file);
            return redirect('kepsek/petugasTU/index');
        }

        public function pegawaiexport()
        {
            return Excel::download(new PegawaiExport,'pegawai.xlsx');
        }

        public function lihatInfo()
        {
            $info = Info::all();
            return view('kepsek/lihat-info', compact('info'));
        }

        public function lihatTU()
        {
            $petugastu = PetugasTU::all();
            return view('kepsek/lihat-TU', compact('petugastu'));
        }
}
