<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        //mengambil data dari tabel profile
        $profile = DB::table('profile')->get();
        // dd($profile);

        //mengirim data profile ke view index
        return view('pelanggan.indexpelanggan', ['profile' => $profile]);
    }

    public function tambahpelanggan()
    {
        return view('pelanggan.tambahpelanggan');
    }

    public function pelanggan(Request $request){
        
        $request->validate([
            'nama' => 'required|',
            'nohp' => 'required|',
            'alamat' => 'required|',
        ]);
     
        DB::table('profile')-> insert([
            'nama' => $request->input['nama_lengkap'],
            'nohp' => $request->input['no_hp'],
            'alamat' => $request->input['alamat'],
        ]);

        return redirect('/pelanggan')->with('success', 'Data berhasil ditambahkan');    }
}
