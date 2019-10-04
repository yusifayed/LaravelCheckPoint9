<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPenjualan;
use App\ModelBarang;

class penjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelPenjualan::all();
        $data1 = ModelBarang::all();
        return view('tb_penjualan', compact('data','data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tb_penjualan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_barang'=>'required',
            'jumlah'=>'required',
            'harga'=>'required',
            ]);

        $data = new ModelPenjualan();
        $data1 = new ModelBarang();
        $data->kd_barang = $request->kd_barang;
        $data->jumlah = $request->jumlah;
        $data1->stok = $data1->stok + $request->jumlah;
        $data->harga = $request->harga;
        $data->save();

        $databeli = ModelBarang::where('kd_barang', $request->kd_barang)->first();
        $databeli->stok = $databeli->stok - $request->jumlah;

        $databeli->save();

        return redirect()->route('jual.index')->with('alert_message', 'Berhasil menambahkan data penjualan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $kd_barang
     * @return \Illuminate\Http\Response
     */
    public function show($kd_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $kd_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($kd_barang)
    {
        $data = ModelPenjualan::where('kd_barang', $kd_barang)->get();
        return view('tb_penjualan_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $kd_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_barang)
    {
        $this->validate($request, [
            'kd_barang'=>'required',
            'jumlah'=>'required',
            'harga'=>'required',
            ]);

        $data = ModelPenjualan::where('kd_barang',$kd_barang)->first();
        $data->kd_barang = $request->kd_barang;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->save();
        return redirect()->route('jual.index')->with('alert_message', 'Berhasil mengubah data Penjualan!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $kd_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_barang)
    {
        $data = ModelPenjualan::where('kd_barang',$kd_barang)->first();
        $data->delete();
        return redirect()->route('jual.index')->with('alert_message', 'Berhasil menghapus data penjualan!');
    }
}
