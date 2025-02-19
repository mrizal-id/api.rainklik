<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'title' => 'Elektronik',
                'name' => 'elektronik',
                'slug' => Str::slug('elektronik'),
                'is_active' => true,
                'image' => null,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pakaian',
                'name' => 'pakaian',
                'slug' => Str::slug('pakaian'),
                'is_active' => true,
                'image' => null,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Laptop',
                'name' => 'laptop',
                'slug' => Str::slug('laptop'),
                'is_active' => true,
                'image' => null,
                'parent_id' => 1, // Elektronik
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kaos',
                'name' => 'kaos',
                'slug' => Str::slug('kaos'),
                'is_active' => true,
                'image' => null,
                'parent_id' => 2, // Pakaian
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
