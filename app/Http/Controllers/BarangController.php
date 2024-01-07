<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();

        return view('barang.index',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $kategori = Kategori::all();

        return view('barang.tambah', ['barang' => $barang, 'kategori' => $kategori]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_brg' => 'required',
            'harga_brg' => 'required',
            'stock_brg' => 'required',
            'deskripsi_brg' => 'required',
            'gambar_brg' => 'required|mimes:jpg,jpeg,png|max:2048',
            'kategori_id' => 'required|interger',
        ]);

        $imageName = time().'.'.$request->gambar_brg->extension();  
         
        $request->gambar_brg->move(public_path('uploads'), $imageName);

        $barang = new Barang;

        $barang->nama_brg = $request->input('title');
        $barang->harga_brg = $request->input('harga');
        $barang->stock_brg = $request->input('stock');
        $barang->deskripsi_brg = $request->input('deskripsi');
        $barang->kategori_id = $request->input('category_id');
        $barang->gambar_brg = $imageName;

        $barang->save();

        Alert::success('Success', 'Data Berhasil');
        return redirect('/barang'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
