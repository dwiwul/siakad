<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Nilai;
use App\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        if(session('level')== 'Pegawai') {
            return view('guru.raport.index', compact('kelas'));
        } else {
            return view('guru.raport.indexAdmin', compact('kelas'));
        }
        return view('guru.raport.index', compact('kelas'));
    }

    public function cetak($idSiswa)
    {
        $data = Nilai::leftJoin('mapel', 'mapel.idMapel', 'nilai.idMapel')
        ->where('nilai.idSiswa', $idSiswa)
        ->get();
        $siswa = Siswa::leftJoin('kelas', 'kelas.idKelas', 'siswa.idKelas')
        ->select('siswa.*', 'kelas.namaKelas')
        ->where('siswa.idSiswa', $idSiswa)->first();

        // return $data;
        // return view('guru.raport.printRaport', compact('data', 'siswa'));
        $pdf = PDF::loadView('guru.raport.printRaport', ['data' => $data, 'siswa' => $siswa]);
        return $pdf->download('Raport.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idKelas)
    {
        $data = Siswa::leftJoin('nilai', 'nilai.idSiswa', 'siswa.idSiswa')
            ->select('siswa.idSiswa', 'siswa.namaSiswa', 'siswa.nis', 'nilai.*')
            ->where('idKelas', $idKelas)->get();
        $kelas = Kelas::where('idKelas', $idKelas)->first();
        return view('guru/raport/detail', compact('data', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
