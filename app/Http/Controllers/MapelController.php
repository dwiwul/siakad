<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Pegawai;
use App\Nilai;
use App\Kelas;
use App\Siswa;
use App\Jadwal;
use App\Mapel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        return view("admin/mapel/index", compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listMapelByGuru()
    {
        $mapel = Jadwal::where('jadwal.idPegawai', session('id'))
            ->leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('mapel', 'mapel.idMapel', 'jadwal.idMapel')
            ->select('mapel.namaMapel', 'jadwal.*', 'kelas.namaKelas', 'kelas.idKelas')
            ->get();
        // return $mapel;
        return view('guru/nilai/listMapel', compact('mapel'));
    }


    public function mapel($idMapel)
    {
        $mapel = Mapel::find($idMapel);

        return view("admin/mapel/index", compact('mapel'));
    }

    public function create()
    {
        return view("admin/mapel/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = new Mapel();
        $mapel->namaMapel = $request->get("namaMapel");
        $mapel->save();
        $mapel = Mapel::all();
        return redirect("admin/mapel/index");
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
    public function edit($idMapel)
    {
        $mapel = Mapel::findOrFail($idMapel);
        return view("admin/mapel/edit", compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMapel)
    {
        Alert::success('Data Berhasil Diubah', 'Success');
        $mapel = Mapel::findOrFail($idMapel);
        $mapel->namaMapel = $request->get("namaMapel");
        $mapel->save();
        return redirect("admin/mapel/index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();
        return redirect('admin/mapel/index');
    }
}
