<?php

namespace App\Http\Controllers;

use Auth;
use App\Siswa;
use App\Guru;
use App\User;
use App\Mapel;
use App\Nilai;
use App\Pegawai;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Jadwal;
use App\Semester;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru/nilai/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nilai($idNilai)
    {
        $nilai = Nilai::find($idNilai);
        return view('nilai.show', compact('nilai'));

        return view('guru/nilai/index')->with('nilai', $idNilai);
    }

    public function listSiswa($id)
    {
        $data = Jadwal::leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('siswa', 'siswa.idKelas', 'kelas.idKelas')
            ->where('jadwal.idJadwal', $id)
            ->whereNotIn('idSiswa', function ($query) {
                $query->select('idSiswa')->from('nilai');
            })
            ->select('siswa.*', 'kelas.namaKelas')
            ->get();

        $mapel = Jadwal::leftJoin('mapel', 'mapel.idMapel', 'jadwal.idMapel')
            ->leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->select('mapel.*', 'kelas.*', 'jadwal.idJadwal')
            ->where('jadwal.idJadwal', $id)->first();
        //  return $id;
        return view('guru/nilai/listSiswa', compact('data', 'mapel'));
    }

    public function detailNilai($idMapel)
    {
        $data = Nilai::leftJoin('mapel', 'mapel.idMapel', 'nilai.idMapel')
            ->leftJoin('siswa', 'siswa.idSiswa', 'nilai.idSiswa')
            ->where('mapel.idMapel', $idMapel)
            ->select('siswa.*', 'nilai.*')
            ->get();
            // return $data;
            return view('guru/nilai/listSiswaDone', compact('data'));
    }

    public function inputNilai(Request $request)
    {
        try {
            Nilai::create([
                'idSiswa' => $request['idSiswa'],
                'idMapel' => $request['idMapel'],
                'idSemester' => $request['idSemester'],
                'idPegawai' => $request['idPegawai'],
                'kkm' => $request['kkm'],
                'nilaiTugas' => $request['nilaiTugas'],
                'nilaiUH' => $request['nilaiUH'],
                'nilaiUTS' => $request['nilaiUTS'],
                'nilaiUAS' => $request['nilaiUAS'],
                'idPegawai' => session('id'),
            ]);
            return redirect(url('listSiswa/'.$request['idJadwal']))->with('alert', 'Berhasil input nilai');
        } catch (\Throwable $th) {
            return $th;
        }
        return $request;
    }

    public function create()
    {
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        $semester = Semester::all();
        // $pegawai = Pegawai::all();
        //$guru = Guru::all();
        $siswa = Siswa::all();
        // $data = [$users, $kelas, $spp];

        return view("guru/nilai/create", compact('nilai', 'mapel', 'siswa', 'semester'));
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
        $nilai = new Nilai();
        $nilai->idMapel = $request->get("idMapel");
        $nilai->idSemester = $request->get("idSemester");
        $nilai->idSiswa = $request->get("idSiswa");
        $nilai->kkm = $request->get("kkm");
        $nilai->nilaiTUgas = $request->get("nilaiTugas");
        $nilai->nilaiUH = $request->get("nilaiUH");
        $nilai->nilaiUTS = $request->get("nilaiUTS");
        $nilai->nilaiUAS = $request->get("nilaiUAS");
        $nilai->save();
        $nilai = nilai::all();
        return redirect('nilai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idNilai)
    {
        $nilai = Nilai::where('id', $idNilai)->first();
        return view('guru/nilai/show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idNilai)
    {
        $nilai = Nilai::findOrFail($idNilai);
        $mapel = Mapel::all();
        $semester = Semester::all();
        // $pegawai = Pegawai::all();
        // $guru = Guru::all();
        $siswa = Siswa::all();
        return view("guru/nilai/edit", compact('nilai', 'mapel', 'semester', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idNilai)
    {
        toast('Data Berhasil Diubah!','success');
        $nilai = Nilai::findOrFail($idNilai);
        $nilai->idMapel = $request->get('idMapel');
        $nilai->idSemester = $request->get('idSemester');
        $nilai->idSiswa = $request->get('idSiswa');
        $nilai->kkm = $request->get("kkm");
        $nilai->nilaiHarian = $request->get("nilaiHarian");
        $nilai->nilaiUts = $request->get("nilaiUts");
        $nilai->nilaiUas = $request->get("nilaiUas");
        $nilai->save();
        return redirect('nilai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idNilai)
    {
        toast('Data Berhasil Dihapus!','success');
        $nilai = Nilai::find($idNilai);
        if (!$nilai) {
            return redirect('nilai');
        }
        $nilai->delete();
        return redirect('nilai');
    }
}
