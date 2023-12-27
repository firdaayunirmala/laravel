<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

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
            'nama_lengkap' => $request->nama,
            'no_hp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);

        Alert::success('Success', 'Data Berhasil');
        return redirect('/pelanggan'); }

        public function show($id){
            $profile = DB::table('profile')->find($id);
            return view('pelanggan.detailpelanggan', compact('profile'));
        }
}
