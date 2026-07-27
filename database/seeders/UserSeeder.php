<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Admin', 'email' => 'admin@kopi.com', 'password' => bcrypt('admin123'), 'role' => 'admin']);
        User::create(['name' => 'Bang Jo', 'email' => 'bangjo@gmail.com', 'password' => bcrypt('bangjo123')]);
        User::create(['name' => 'RJ Coffee', 'email' => 'rjcoffee@kopi.com', 'password' => bcrypt('rjcoffee123')]);
    }
}
