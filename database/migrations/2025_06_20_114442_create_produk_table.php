<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->enum('kategori', ['Makanan', 'Minuman', 'Snack'])->default('Makanan');
            $table->integer('harga_jual');
            $table->integer('stok')->default(0);
            $table->enum('satuan', ['pcs', 'gelas', 'bungkus'])->default('pcs');
            $table->enum('status_produk', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
