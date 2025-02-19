<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Tips Memilih Laptop Gaming Terbaik untuk Kebutuhan Anda',
                'slug' => Str::slug('Tips Memilih Laptop Gaming Terbaik untuk Kebutuhan Anda'),
                'content' => 'Dalam memilih laptop gaming, ada beberapa faktor penting yang perlu dipertimbangkan. Mulai dari spesifikasi hardware, ukuran layar, hingga fitur tambahan seperti sistem pendingin dan keyboard RGB. Artikel ini akan memberikan panduan lengkap untuk membantu Anda memilih laptop gaming yang sesuai dengan kebutuhan dan budget Anda.',
                'cover' => '/images/no-image.jpg',
                'category' => 'Tips & Panduan',
                'tags' => json_encode(['laptop', 'gaming', 'tips', 'panduan']), // Ubah ke array
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tren Fashion Terbaru: Kaos Polos yang Kembali Populer',
                'slug' => Str::slug('Tren Fashion Terbaru: Kaos Polos yang Kembali Populer'),
                'content' => 'Kaos polos kembali menjadi tren fashion yang digemari banyak orang. Dengan berbagai pilihan warna dan bahan, kaos polos dapat dipadukan dengan berbagai outfit untuk menciptakan tampilan yang stylish dan casual. Artikel ini akan membahas tren fashion terbaru seputar kaos polos dan memberikan inspirasi outfit yang bisa Anda coba.',
                'cover' => '/images/no-image.jpg',
                'category' => 'Fashion',
                'tags' => json_encode(['fashion', 'kaos', 'tren', 'polos']), // Ubah ke array
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Panduan Lengkap Memulai Belajar Laravel untuk Pemula',
                'slug' => Str::slug('Panduan Lengkap Memulai Belajar Laravel untuk Pemula'),
                'content' => 'Laravel adalah framework PHP yang populer dan banyak digunakan untuk membangun aplikasi web. Artikel ini akan memberikan panduan lengkap bagi pemula yang ingin memulai belajar Laravel. Mulai dari instalasi, konsep dasar, hingga contoh aplikasi sederhana.',
                'cover' => '/images/no-image.jpg',
                'category' => 'Tutorial',
                'tags' => json_encode(['laravel', 'tutorial', 'php', 'web development']), // Ubah ke array
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Promo Spesial Rainklik: Diskon Hingga 50% untuk Produk Elektronik',
                'slug' => Str::slug('Promo Spesial Rainklik: Diskon Hingga 50% untuk Produk Elektronik'),
                'content' => 'Rainklik sedang mengadakan promo spesial untuk produk elektronik. Dapatkan diskon hingga 50% untuk berbagai produk seperti laptop, smartphone, dan aksesoris elektronik lainnya. Jangan lewatkan kesempatan ini untuk mendapatkan produk impian Anda dengan harga yang lebih terjangkau.',
                'cover' => '/images/no-image.jpg',
                'category' => 'Promo',
                'tags' => json_encode(['promo', 'diskon', 'elektronik', 'rainklik']), // Ubah ke array
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
