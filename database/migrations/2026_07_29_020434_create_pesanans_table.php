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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->string('nama_pelanggan')->nullable();
            $table->string('nomor_meja')->nullable();
            $table->integer('total_harga')->default(0);
            $table->enum('status_pembayaran', ['unpaid', 'paid'])->default('unpaid');
            $table->enum('status_pesanan', ['pending', 'proses', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
