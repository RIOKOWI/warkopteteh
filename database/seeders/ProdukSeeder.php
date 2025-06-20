<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_produk' => 'Es Teh Manis',
                'kategori' => 'Minuman',
                'harga_jual' => 5000,
                'stok' => 50,
                'satuan' => 'gelas',
                'status_produk' => 'Aktif',
                'deskripsi' => 'Segar dan manis',
            ],
            [
                'nama_produk' => 'Indomie Goreng',
                'kategori' => 'Makanan',
                'harga_jual' => 10000,
                'stok' => 30,
                'satuan' => 'bungkus',
                'status_produk' => 'Aktif',
                'deskripsi' => 'Dihidangkan dengan telur',
            ]
        ];

        foreach ($data as $item) {
            Produk::create($item);
        }
    }
}
