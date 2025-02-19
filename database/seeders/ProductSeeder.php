<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Laptop ASUS ROG',
                'slug' => Str::slug('Laptop ASUS ROG'),
                'description' => 'Laptop gaming dengan spesifikasi tinggi.',
                'price' => 15000000,
                'discount_price' => 14500000,
                'stock' => 10,
                'type' => 'physical',
                'image_url' => '/images/no-image.jpg',
                'video_url' => null,
                'license_type' => null,
                'license_expiry' => null,
                'download_limit' => null,
                'is_active' => true,
                'is_returnable' => true,
                'warranty_period' => 365,
                'category_id' => 3, // Laptop
                'parent_category_id' => 1, // Elektronik
                'physical_shipping' => true,
                'shipping_method_id' => 1, // Reguler
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kaos Polos Hitam',
                'slug' => Str::slug('Kaos Polos Hitam'),
                'description' => 'Kaos polos nyaman dipakai sehari-hari.',
                'price' => 50000,
                'discount_price' => null,
                'stock' => 50,
                'type' => 'physical',
                'image_url' => '/images/no-image.jpg',
                'video_url' => null,
                'license_type' => null,
                'license_expiry' => null,
                'download_limit' => null,
                'is_active' => true,
                'is_returnable' => true,
                'warranty_period' => null,
                'category_id' => 4, // Kaos
                'parent_category_id' => 2, // Pakaian
                'physical_shipping' => true,
                'shipping_method_id' => 2, // Express
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ebook Laravel Tutorial',
                'slug' => Str::slug('Ebook Laravel Tutorial'),
                'description' => 'Ebook panduan lengkap Laravel.',
                'price' => 100000,
                'discount_price' => null,
                'stock' => 0,
                'type' => 'digital',
                'image_url' => '/images/no-image.jpg',
                'video_url' => null,
                'license_type' => 'Personal',
                'license_expiry' => '2025-12-31',
                'download_limit' => 5,
                'is_active' => true,
                'is_returnable' => null,
                'warranty_period' => null,
                'category_id' => null,
                'parent_category_id' => null,
                'physical_shipping' => null,
                'shipping_method_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
