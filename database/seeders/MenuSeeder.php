<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('menus')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('menus')->insert([
            // --- Kopi Panas ---
            ['nama_menu' => 'Espresso Hot', 'deskripsi' => 'Kopi hitam pekat.', 'kategori_id' => 2, 'harga' => 10000, 'gambar' => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Americano Hot', 'deskripsi' => 'Espresso plus air panas.', 'kategori_id' => 2, 'harga' => 12000, 'gambar' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Kopi Hitam Tubruk', 'deskripsi' => 'Kopi hitam berampas.', 'kategori_id' => 2, 'harga' => 10000, 'gambar' => 'https://images.unsplash.com/photo-1517256064527-09c73fc73e38?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Kopi Susu Hot', 'deskripsi' => 'Kopi susu hangat.', 'kategori_id' => 2, 'harga' => 14000, 'gambar' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Cappuccino Hot', 'deskripsi' => 'Kopi, susu, dan foam.', 'kategori_id' => 2, 'harga' => 18000, 'gambar' => 'https://images.unsplash.com/photo-1534778101976-62847782c213?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Latte Hot', 'deskripsi' => 'Espresso susu lembut.', 'kategori_id' => 2, 'harga' => 18000, 'gambar' => 'https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
            
            // --- Kopi Dingin & Teh ---
['nama_menu' => 'Ice Americano', 'deskripsi' => 'Americano dingin segar.', 'kategori_id' => 2, 'harga' => 13000, 'gambar' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],

['nama_menu' => 'Ice Kopi Susu', 'deskripsi' => 'Kopi susu dingin.', 'kategori_id' => 2, 'harga' => 15000, 'gambar' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],

['nama_menu' => 'Ice Kopi Susu Gula Aren', 'deskripsi' => 'Kopi susu gula aren.', 'kategori_id' => 2, 'harga' => 16000, 'gambar' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],

['nama_menu' => 'Ice Cappuccino', 'deskripsi' => 'Cappuccino es segar.', 'kategori_id' => 2, 'harga' => 19000, 'gambar' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],

['nama_menu' => 'Ice Caramel Machiatto', 'deskripsi' => 'Kopi sirup karamel.', 'kategori_id' => 2, 'harga' => 20000, 'gambar' => 'https://images.unsplash.com/photo-1485808191679-5f86510681a2?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],

['nama_menu' => 'Ice Teh Manis', 'deskripsi' => 'Es teh manis segar.', 'kategori_id' => 3, 'harga' => 5000, 'gambar' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],

['nama_menu' => 'Ice Lemon Tea', 'deskripsi' => 'Teh es rasa lemon.', 'kategori_id' => 3, 'harga' => 10000, 'gambar' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],

['nama_menu' => 'Ice Matcha Latte', 'deskripsi' => 'Matcha susu dingin.', 'kategori_id' => 3, 'harga' => 17000, 'gambar' => 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?w=700&q=90', 'created_at' => now(), 'updated_at' => now()],
            // --- Makanan ---
            ['nama_menu' => 'Kentang Goreng', 'deskripsi' => 'Kentang goreng gurih.', 'kategori_id' => 1, 'harga' => 12000, 'gambar' => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Roti Bakar Coklat Keju', 'deskripsi' => 'Roti coklat keju.', 'kategori_id' => 1, 'harga' => 15000, 'gambar' => 'https://images.unsplash.com/photo-1484723091739-30a097e8f929?w=500&q=80', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}