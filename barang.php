<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelBarang;

class barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelBarang::all();
        return view('tb_barang', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tb_barang_create');
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
            'nama_barang'=>'required',
            'stok'=>'required',
            'harga'=>'required',
        ]);

        $data = new ModelBarang();
        $data->kd_barang = $request->kd_barang;
        $data->nama_barang = $request->nama_barang;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->save();

        return redirect()->route('barang.index')->with('alert_message', 'Berhasil menambahkan data barang!');
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
        $data = ModelBarang::where('id', $id)->get();
        return view('tb_barang_edit',compact('data'));
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
        $this->validate($request, [
            'kd_barang'=>'required',
            'nama_barang'=>'required',
            'stok'=>'required',
            'harga'=>'required',
        ]);

        $data = ModelBarang::where('id',$id)->first();
        $data->kd_barang = $request->kd_barang;
        $data->nama_barang = $request->nama_barang;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->save();
        return redirect()->route('barang.index')->with('alert_message', 'Berhasil mengubah data barang!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelBarang::where('id',$id)->first();
        $data->delete();
        return redirect()->route('barang.index')->with('alert_message', 'Berhasil menghapus data!');
    }
}
