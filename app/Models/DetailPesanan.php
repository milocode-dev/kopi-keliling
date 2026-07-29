<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $fillable = [
        'pesanan_id',
        'menu_id',
        'jumlah',
        'harga',
        'subtotal'
    ];

    public function Pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
