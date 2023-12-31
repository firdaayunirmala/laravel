<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    // protected $fillable = ['nama_brg','harga_brg',
    // 'stock_brg','deskripsi','gambar_brg','kategori_id'];
    protected $guarded = ['id' => 'string'];
}
