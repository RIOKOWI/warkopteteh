<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'nama_pelanggan',
        'tanggal_penjualan',
        'total_item',
        'total_harga',
        'metode_pembayaran',
        'status_transaksi',
        'catatan_transaksi',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
