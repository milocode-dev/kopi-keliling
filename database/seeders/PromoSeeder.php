<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Promo;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $americano = Product::where('slug', 'americano')->first();
        $butterscotch = Product::where('slug', 'butterscotch')->first();
        $chocolatemilky = Product::where('slug', 'chocolate-milky')->first();

        Promo::create(['product_id' => $americano->id,
                       'discount_type' => 'percent',
                       'discount_value' => 10,
                       'start_date' => now(),
                       'end_date' => now()->addDays(7),
                       'is_active' => true,
                       ]);

        Promo::create(['product_id' => $butterscotch->id,
                       'discount_type' => 'fixed',
                       'discount_value' => 2000,
                       'start_date' => now(),
                       'end_date' => now()->addDays(5),
                       'is_active' => true,
                       ]);

        Promo::create(['product_id' => $chocolatemilky->id,
                       'discount_type' => 'percent',
                       'discount_value' => 15,
                       'start_date' => now(),
                       'end_date' => now()->addDays(10),
                       'is_active' => true,
                       ]);
    }
}
