<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();

        return view('kategori.index', ['kategori' => $kategori]);
          
        $title = 'Peringatan !';
        $text = "Apakah anda yakin ingin menghapus ?";
        confirmDelete($title, $text);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('kategori.tambah', ['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Kategori::create([
    		'nama_kategori' => $request->nama,
    	]);
        // $kategori = new Kategori;
        // $kategori->nama_kategori = $request->input('nama');
        // $kategori->save();

        Alert::success('Success', 'Data Berhasil');
        return redirect('/kategori'); 
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->input('nama');
        $kategori->update();

        Alert::success('Success', 'Data Berhasil');

        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        Alert::success('Success', 'Data Berhasil di Hapus');

        return redirect('/kategori');
    }
}
