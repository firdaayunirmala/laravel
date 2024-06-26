<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BerhitungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/user/{id}', function ($id) {
    //     return 'SMK TELKOM PURWOKERTO ' .$id;
    // });
    
    // Route::get('/user/{name?}', function ($name = 'firda') {
        //     return $name;
        // });
        
        Route::get('/', function () {
            return view('welcome');
        });
        
        // Route::get('/hitung', [BerhitungController::class, 'hitung']);
        
        

//route kategori
Route::resource('kategori', KategoriController::class);

//route barang
Route::resource('barang', BarangController::class);

//route dashboard
Route::get('/dashboard', [DashboardController::class,'index']);
Route::get('/pendataan', function () {
    return view('pendataan');
});

// Route::get('/hitung2', [HitungController::class, 'hitung']);

Route::get('/daftar', [TestController::class, 'daftar']);
Route::post('/kirim', [TestController::class, 'kirim']);

Route::middleware(['auth'])->group(function () {
   //route pelanggan
Route::get('/pelanggan', [PelangganController::class,'index']); //untuk menampilkan seluruh data
Route::get('/tambahpelanggan', [PelangganController::class,'tambahpelanggan']); // untuk menampilkan tambah data 
Route::post('/pelanggan', [PelangganController::class,'pelanggan']); // untuk menyimpan data baru 
Route::get('/pelanggan/{pelanggan_id}',[PelangganController::class, 'show']); // untuk menampilkan data berdasarkan id tertentu
Route::get('/pelanggan/{pelanggan_id}/edit',[PelangganController::class, 'edit']); // untuk mengedit data berdasarkan id tertentu
Route::put('/pelanggan/{pelanggan_id}',[PelangganController::class, 'update']); // untuk mengupdate data berdasarkan id tertentu
Route::delete('/pelanggan/{pelanggan_id}',[PelangganController::class, 'destroy']); // untuk mengupdate data berdasarkan id tertentu
});

Auth::routes();

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


