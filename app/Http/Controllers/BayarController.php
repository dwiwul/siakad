<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bayar;
use RealRashid\SweetAlert\Facades\Alert;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailbayar = Bayar::all();
        return view('admin/bayar/index', compact('detailbayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailbayar = Bayar::all();
        return view('admin/bayar/create', compact('bayar'));
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
        $detailbayar = new Bayar();
        $detailbayar->jenisBayar = $request->get("jenisBayar");
        $detailbayar->save();
        $detailbayar = Bayar::all();
        return redirect('admin/bayar/index');
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
        $detailbayar = Bayar::where('idbayar', $id)->first();
        return view('admin/bayar/edit', compact('detailbayar', 'id'));
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
        Alert::success('Data Berhasil Diubah', 'Success');
        Bayar::where('idBayar', $id)
        ->update([
            'jenisBayar' => $request->jenisBayar,
        ]);
        return redirect('admin/bayar/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        toast('Data Berhasil Dihapus!','success');
        $detailbayar = Bayar::find($id);
        $detailbayar->delete();
        return redirect('admin/bayar/index');
    }
}
