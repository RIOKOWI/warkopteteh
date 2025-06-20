<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahan = BahanBaku::all();
        return view('bahan.index', compact('bahan'));
    }

    public function create()
    {
        return view('bahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama_bahan' => 'required',
        'kategori' => 'required',
        'stok' => 'required|numeric',
        'satuan' => 'required',
        'harga' => 'required|numeric',
    ]);

        $status = 'tersedia';
        if ($request->stok == 0) {
            $status = 'habis';
        } elseif ($request->stok > 0 && $request->stok <= 20) {
            $status = 'menipis';
        }

        $data = $request->all();
        $data['status_bahan'] = $status;

        BahanBaku::create($data);

        return redirect()->route('bahan.index')->with('success', 'Bahan baku ditambahkan.');
    }

    public function edit(BahanBaku $bahan)
    {
        return view('bahan.edit', compact('bahan'));
    }

    public function update(Request $request, BahanBaku $bahan)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'status_bahan' => 'required',
        ]);

        $bahan->update($request->all());

        return redirect()->route('bahan.index')->with('success', 'Bahan baku diperbarui.');
    }

    public function destroy(BahanBaku $bahan)
    {
        $bahan->delete();
        return redirect()->route('bahan.index')->with('success', 'Bahan baku dihapus.');
    }

    public function filter($status)
    {
        $bahan = BahanBaku::where('status_bahan', $status)->get();
        return view('bahan.index', compact('bahan'))->with('filter', $status);
    }

}
