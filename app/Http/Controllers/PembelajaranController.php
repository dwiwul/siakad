<?php

namespace App\Http\Controllers;
use App\Pembelajaran;
use App\Jadwal;
use App\Mapel;
use App\Kelas;
use Illuminate\Support\Facades\DB;
use App\Semester;
use App\Pegawai;

use Illuminate\Http\Request;

class PembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelajaran = Pembelajaran::all();
        $pegawai = Pegawai::all();
        $semester = Semester::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('admin/pembelajaran/index', compact('pembelajaran', 'pegawai', 'semester', 'kelas', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $pegawai = Pegawai::all();
        $semester = Semester::all();
        $mapel = Mapel::all();
        return view('admin/pembelajaran/create', compact('semester', 'kelas', 'pegawai', 'mapel'));
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
