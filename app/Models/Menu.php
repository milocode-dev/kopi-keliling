<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama_menu',
        'harga',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
