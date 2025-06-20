<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga_jual',
        'stok',
        'satuan',
        'status_produk',
        'deskripsi',
        'foto',
    ];
}
