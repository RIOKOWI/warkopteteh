<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans = Penjualan::with('produk')->latest()->get();
        return view('penjualan.index', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        return view('penjualan.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'tanggal_penjualan' => 'required|date',
            'nama_pelanggan' => 'nullable|string|max:255',
            'total_item' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|in:cash,transfer',
            'status_transaksi' => 'required|in:selesai,tertunda',
            'catatan_transaksi' => 'nullable|string',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $total_harga = $produk->harga_jual * $request->total_item;

        Penjualan::create([
            'produk_id' => $request->produk_id,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_item' => $request->total_item,
            'total_harga' => $total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_transaksi' => $request->status_transaksi,
            'catatan_transaksi' => $request->catatan_transaksi,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penjualan = Penjualan::findOrFail($id); 
        $produks = Produk::all();
        return view('penjualan.edit', compact('penjualan', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'tanggal_penjualan' => 'required|date',
            'nama_pelanggan' => 'nullable|string|max:255',
            'total_item' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|in:cash,transfer',
            'status_transaksi' => 'required|in:selesai,tertunda',
            'catatan_transaksi' => 'nullable|string',
        ]);

        $penjualan = Penjualan::findOrFail($id); 
        $produk = Produk::findOrFail($request->produk_id);
        $total_harga = $produk->harga_jual * $request->total_item;

        $penjualan->update([
            'produk_id' => $request->produk_id,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_item' => $request->total_item,
            'total_harga' => $total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_transaksi' => $request->status_transaksi,
            'catatan_transaksi' => $request->catatan_transaksi,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan = Penjualan::findOrFail($id); 
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
