<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanBaku extends Model
{
     use HasFactory;

    protected $table = 'bahan_baku';

    protected $fillable = [
        'nama_bahan',
        'kategori',
        'stok',
        'satuan',
        'harga',
        'status_bahan',
        'catatan',
    ];
}
