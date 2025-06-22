<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::all();
        $query = Penjualan::with('produk')->orderBy('tanggal_penjualan', 'desc');

        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tanggal_penjualan', [$request->dari, $request->sampai]);
        }

        if ($request->filled('produk_id')) {
            $query->where('produk_id', $request->produk_id);
        }

        if ($request->filled('metode_pembayaran')) {
            $query->where('metode_pembayaran', $request->metode_pembayaran);
        }

        if ($request->filled('status_transaksi')) {
            $query->where('status_transaksi', $request->status_transaksi);
        }

        $penjualans = $query->get();
        $total = $penjualans->sum('total_harga');

        return view('laporan.index', compact('penjualans', 'produks', 'total'));
    }
}
