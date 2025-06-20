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
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->string('kategori')->default('Lainnya');
            $table->float('stok')->default(0);
            $table->enum('satuan', ['pcs', 'gram', 'liter', 'bungkus']);
            $table->integer('harga')->default(0);
            $table->enum('status_bahan', ['tersedia', 'menipis', 'habis'])->default('tersedia');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_baku');
    }
};
