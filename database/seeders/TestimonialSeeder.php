<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create(['user_id' => 2, 'product_id' => 2, 'description' => 'This is the most butterscotch ever ive seen', 'rating' => 5]);
        Testimonial::create(['user_id' => 3, 'product_id' => 1, 'description' => 'This is the most americano ever ive seen', 'rating' => 5]);
        Testimonial::create(['user_id' => 2, 'product_id' => 3, 'description' => 'This is the basic of chocolate miky', 'rating' => 4]);
    }
}
