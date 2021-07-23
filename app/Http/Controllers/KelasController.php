<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Pegawai;
use App\Jadwal;
use App\Siswa;
use Illumninate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view("admin.kelas.index", compact('kelas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin/kelas/create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas();
        $kelas->namaKelas = $request->get("namaKelas");
        $kelas->save();
        $kelas = Kelas::all();
        return redirect('admin/kelas/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::where('idKelas', $id)->first();
        $siswa = Siswa::where('idKelas', $id)->get();
        return view('admin/kelas/show', compact('kelas', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::where('idKelas', $id)->first();
        return view('admin/kelas/edit', compact('kelas', 'id'));
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
        Kelas::where('idKelas', $id)
        ->update([
            'namaKelas' => $request->namaKelas,
        ]);
        return redirect('admin/kelas/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('admin/kelas/index');
    }
}
