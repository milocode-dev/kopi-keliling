<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $coffee = Category::where('slug', 'coffee')->first();
     $noncoffee = Category::where('slug', 'non-coffee')->first();

     Product::create(['category_id' => $coffee->id,
                      'name' => 'Americano',
                      'slug' => Str::slug('Americano'),
                      'description' => 'a popular coffee drink made by combining espresso shots with hot water, resulting in a strength and volume similar to drip coffee but with a distinct flavor profile',
                      'price' => 8000,
                      'stock' => 57,
                      'image' => 'default.png',
                      ]);
     Product::create(['category_id' => $coffee->id,
                      'name' => 'Butterscotch',
                      'slug' => Str::slug('Butterscotch'),
                      'description' => 'a sweet food and flavor made from brown sugar and butter, boiled together with optional cream, vanilla, or salt',
                      'price' => 12000,
                      'stock' => 30,
                      'image' => 'default.png',
                      ]);
     Product::create(['category_id' => $noncoffee->id,
                      'name' => 'Chocolate Milky',
                      'slug' => Str::slug('Chocolate-Milky'),
                      'description' => 'Chocolate milk is a sweet, creamy, and smooth dairy drink made by mixing milk with cocoa powder and sugar.',
                      'price' => 15000,
                      'stock' => 70,
                      'image' => 'default.png',
                      ]);
     Product::create(['category_id' => $noncoffee->id,
                      'name' => 'Thai Tea Milk',
                      'slug' => Str::slug('Thai-Tea-Milk'),
                      'description' => 'a sweet, creamy, and cold iced beverage made from strong black Assam or Ceylon tea, spices, and rich milks.',
                      'price' => 15000,
                      'stock' => 28,
                      'image' => 'default.png',
                      ]);
    }
}
