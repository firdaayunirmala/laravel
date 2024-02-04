<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerhitungController extends Controller
{
    public function hitung(){
        $bil1 = 10;
        $bil2 = 5;
        $hasil = $bil1 - $bil2;
        return view('hasil', ['hasiljumlah' => $hasil]);

    }
}
