<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $posts = Post::latest()->take(5)->get(['title', 'cover', 'content', 'slug', 'created_at', 'category']);

        $featured = $posts->first(); // Ambil post pertama sebagai featured
        $recentPosts = $posts->skip(1); // Sisanya sebagai recent posts

        return view('home.index', compact('featured', 'recentPosts'));
    }
}
