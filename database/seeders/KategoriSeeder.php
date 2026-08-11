<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        // Menghapus data lama agar ID terreset secara rapi
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('kategoris')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('kategoris')->insert([
            ['id' => 1, 'nama_kategori' => 'MAKANAN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama_kategori' => 'MINUMAN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama_kategori' => 'TEA SERIES', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}