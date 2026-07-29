<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'nama_pelanggan',
        'nomor_meja',
        'total_harga',
        'status_pembayaran',
        'status_pesanan'
    ];

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
