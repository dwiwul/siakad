<?php
// setlocale(LC_TIME, 'id_ID.utf8');
namespace App\Http\Controllers;

use AbsensiDetail;
use App\Absensi;
use App\AbsensiDetail as AppAbsensiDetail;
use App\Jadwal;
use App\Kelas;
use App\Siswa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hariIndo($hariInggris)
    {
        switch ($hariInggris) {
            case 'Sunday':
                return 'Minggu';
            case 'Monday':
                return 'Senin';
            case 'Tuesday':
                return 'Selasa';
            case 'Wednesday':
                return 'Rabu';
            case 'Thursday':
                return 'Kamis';
            case 'Friday':
                return 'Jum`at';
            case 'Saturday':
                return 'Sabtu';
            default:
                return 'hari tidak valid';
        }
    }

    public function index()
    {

        $day = date("l");
        $hari = $this->hariIndo($day);


        $data = Jadwal::where('jadwal.idPegawai', session('id'))
            ->leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('mapel', 'mapel.idMapel', 'jadwal.idMapel')
            ->select('mapel.namaMapel', 'kelas.namaKelas','jadwal.*')
            ->where('jadwal.hari', $hari)
            ->get();

        return view('guru/absensi/jadwal', compact('data'));
    }

    public function listAbsen($id)
    {
        $kelas = Jadwal::where('idJadwal', $id)->first();
        $data = Absensi::leftJoin('jadwal', 'jadwal.idJadwal', 'absensi.idJadwal')
            ->leftJoin('mapel', 'mapel.idMapel', 'jadwal.idMapel')
            ->leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->where('absensi.idJadwal', $id)
            ->get();
        // return $data;
        // return $id;
        return view('guru.absensi.listAbsensi', compact('data', 'kelas', 'id'));
    }

    public function listSiswa($idJadwal, $idKelas)
    {
        // return $idKelas;
        $data = Jadwal::leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('siswa', 'siswa.idKelas', 'kelas.idKelas')
            ->where('jadwal.idKelas', $idKelas)
            ->where('jadwal.idJadwal', $idJadwal)
            ->select('siswa.*', 'kelas.namaKelas')
            ->get();
        // return $data;
        return view('guru.absensi.listSiswa', compact('data', 'idJadwal'));
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
        // return $request;
        // $absensi['idJadwal'] = $request['idJadwal'];
        // $absensi['tgl'] = Date('Y-m-d');
        // $absensi['created_at'] = Date('Y-m-d H:i:s');
        // $absensi['updated_at'] = Date('Y-m-d H:i:s');
        // Absensi::create($absensi);
        // $id = Absensi::orderBy('idAbsensi', 'DESC')->first();
        // $absensiDetail = [];

        // for ($i = 0; $i < count($request['idSiswa']); $i++) {
        //     $a = $request['idSiswa'][$i];
        //     // return $request['keterangan' . $a][0] ;
        //     if ($request['keterangan' . $a][0] == 1) {
        //         $absensiDetail['idAbsensi'] = $id->idAbsensi;
        //         $absensiDetail['idSiswa'] = $request['idSiswa'][$i];
        //         $absensiDetail['sakit'] = 0;
        //         $absensiDetail['ijin'] = 0;
        //         $absensiDetail['alpha'] = 0;
        //         $absensiDetail['created_at'] = Date('Y-m-d H:i:s');
        //         $absensiDetail['updated_at'] = Date('Y-m-d H:i:s');
        //     } else if ($request['keterangan' . $a][0] == 2) {
        //         $absensiDetail['idAbsensi'] = $id->idAbsensi;
        //         $absensiDetail['idSiswa'] = $request['idSiswa'][$i];
        //         $absensiDetail['sakit'] = 1;
        //         $absensiDetail['ijin'] = 0;
        //         $absensiDetail['alpha'] = 0;
        //         $absensiDetail['created_at'] = Date('Y-m-d H:i:s');
        //         $absensiDetail['updated_at'] = Date('Y-m-d H:i:s');
        //     } else if ($request['keterangan' . $a][0] == 3) {
        //         $absensiDetail['idAbsensi'] = $id->idAbsensi;
        //         $absensiDetail['idSiswa'] = $request['idSiswa'][$i];
        //         $absensiDetail['sakit'] = 0;
        //         $absensiDetail['ijin'] = 1;
        //         $absensiDetail['alpha'] = 0;
        //         $absensiDetail['created_at'] = Date('Y-m-d H:i:s');
        //         $absensiDetail['updated_at'] = Date('Y-m-d H:i:s');
        //     } else if ($request['keterangan' . $a][0] == 4) {
        //         $absensiDetail['idAbsensi'] = $id->idAbsensi;
        //         $absensiDetail['idSiswa'] = $request['idSiswa'][$i];
        //         $absensiDetail['sakit'] = 0;
        //         $absensiDetail['ijin'] = 0;
        //         $absensiDetail['alpha'] = 1;
        //         $absensiDetail['created_at'] = Date('Y-m-d H:i:s');
        //         $absensiDetail['updated_at'] = Date('Y-m-d H:i:s');
        //     }
        //     AppAbsensiDetail::create($absensiDetail);
        // }
        $absensi['idJadwal'] = $request['idJadwal'];
        $absensi['tgl'] = Date('Y-m-d');
        $absensi['created_at'] = Date('Y-m-d H:i:s');
        $absensi['updated_at'] = Date('Y-m-d H:i:s');
        Absensi::create($absensi);
        $id = Absensi::orderBy('idAbsensi', 'DESC')->first();
        $absensiDetail = [];

        for ($i = 0; $i < count($request['idSiswa']); $i++) {
            $a = $request['idSiswa'][$i];
            return $request['keterangan' . $a][0] ;
            $absensiDetail['idAbsensi'] = $id->idAbsensi;
            $absensiDetail['idSiswa'] = $request['idSiswa'][$i];
            $absensiDetail['keterangan'] = $request['keterangan' . $a][0];
            $absensiDetail['created_at'] = Date('Y-m-d H:i:s');
            $absensiDetail['updated_at'] = Date('Y-m-d H:i:s');

            AppAbsensiDetail::create($absensiDetail);
        }
        // return $absensiDetail;
        return redirect('/absen/list/' . $request['idJadwal']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idAbsen)
    {
        $data = AppAbsensiDetail::leftJoin('siswa', 'siswa.idSiswa', 'absensi_detail.idSiswa')
            ->select('siswa.namaSiswa', 'absensi_detail.*')
            ->where('absensi_detail.idAbsensi', $idAbsen)
            ->get();
            // return $data;
        return view('guru.absensi.listAbsensiDetail', compact('data'));
    }

    public function getPdf($idAbsen)
    {
        $data = AppAbsensiDetail::leftJoin('siswa', 'siswa.idSiswa', 'absensi_detail.idSiswa')
            ->select('siswa.*', 'absensi_detail.*')
            ->where('absensi_detail.idAbsensi', $idAbsen)
            ->get();
        // return $data;
        $mpl = Absensi::leftJoin('jadwal', 'jadwal.idJadwal', 'absensi.idJadwal')
            ->leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('mapel', 'mapel.idMapel', 'jadwal.idMapel')
        ->first();

        // return view('guru.absensi.printAbsenPdf', compact('data', 'mpl'));
        $pdf = PDF::loadView('guru.absensi.printAbsenPdf', ['data'=>$data, 'mpl'=>$mpl]);
        return $pdf->download('Detail_Absensi.pdf');
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
