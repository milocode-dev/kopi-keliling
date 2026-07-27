<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Coffee', 'slug' => Str::slug('Coffee')]);
        Category::create(['name' => 'Non-Coffee', 'slug' => Str::slug('Non-Coffee')]);
    }
}
