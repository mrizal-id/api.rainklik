<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product; // Tambahkan use statement untuk model Product

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(5)->get(['title', 'cover', 'content', 'slug', 'created_at', 'category']);

        $featured = $posts->first();
        $recentPosts = $posts->skip(1);

        // Ambil data produk
        $products = Product::all(); // Atau query lain untuk mengambil produk

        // Kirim data produk ke view
        return view('home.index', compact('featured', 'recentPosts', 'products'));
    }
}
