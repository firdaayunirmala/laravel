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
            'nama' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'filename' => 'required',
            'kategori' => 'required',
        ]);
      
        $imageName = time().'.'.$request->filename->extension();  
         
        $request->filename->move(public_path('uploads'), $imageName);

        $barang = new Barang;

        $barang->nama_brg = $request->input('nama');
        $barang->harga_brg = $request->input('harga');
        $barang->stock_brg = $request->input('stock');
        $barang->deskripsi_brg = $request->input('deskripsi');
        $barang->kategori_id = $request->input('kategori');
        $barang->gambar_brg = $imageName ; //test dulu

        $barang->save();

        Alert::success('Success', 'Data Berhasil');
        return redirect('/barang'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);
        return view('barang.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'filename' => 'required',
            'kategori' => 'required',
        ]);

        $barang = Barang::find($id);
        $kategori = Kategori::find($id);

        $imageName = time().'.'.$request->filename->extension();  
         
        $request->filename->move(public_path('uploads'), $imageName);

        $barang->nama_brg = $request->input('nama');
        $barang->harga_brg = $request->input('harga');
        $barang->stock_brg = $request->input('stock');
        $barang->deskripsi_brg = $request->input('deskripsi');
        $barang->kategori_id = $request->input('kategori');
        $barang->gambar_brg = $imageName ; 
        $barang->update();

        Alert::success('Success', 'Data Update Berhasil ');

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
