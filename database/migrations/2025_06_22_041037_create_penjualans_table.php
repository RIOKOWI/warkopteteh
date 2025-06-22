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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->string('nama_pelanggan')->nullable();
            $table->dateTime('tanggal_penjualan');
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->enum('metode_pembayaran', ['cash', 'transfer']);
            $table->enum('status_transaksi', ['selesai', 'tertunda']);
            $table->text('catatan_transaksi')->nullable();
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
