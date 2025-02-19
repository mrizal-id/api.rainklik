<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->input('query');

            $posts = Post::when($query, function ($q) use ($query) {
                return $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%");
            })
                ->latest()
                ->take(5)
                ->get(['title', 'slug', 'cover', 'created_at']);

            // Format created_at dan tambahkan share_count
            $posts->each(function ($post) {
                $post->created_at = Carbon::parse($post->created_at)->diffForHumans();
                $post->share_count = $post->shareCount();
                $post->formatted_share_count = $this->formatNumber($post->share_count); // Tambahkan ini
            });

            return response()->json($posts);
        }

        $posts = Post::latest()->take(5)->get(['title', 'cover', 'content', 'slug']);

        // Tambahkan share_count dan formatted_share_count ke setiap item di koleksi
        $posts = $posts->map(function ($post) {
            $post->share_count = $post->shareCount();
            $post->formatted_share_count = $this->formatNumber($post->share_count); // Tambahkan ini
            return $post;
        });

        return view('home.blog.index', compact('posts'));
    }

    // Fungsi formatNumber()
    private function formatNumber($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'm';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'k';
        } else {
            return $number;
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.posts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string', // Validasi tag individual sebagai string
            'user_id' => 'required|exists:users,id', // Asumsi user_id berasal dari model User
        ]);

        // Menghandle upload cover image jika ada
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        } else {
            $coverPath = null; // Tidak ada cover, set ke null
        }

        // Membuat post baru
        $post = Post::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']), // Membuat slug otomatis berdasarkan title
            'content' => $validatedData['content'],
            'cover' => $coverPath, // Menyimpan path gambar
            'category' => $validatedData['category'],
            'tags' => json_encode($validatedData['tags']), // Menyimpan tags sebagai JSON
            'user_id' => $validatedData['user_id'],
        ]);

        // Redirect atau memberikan respon
        return redirect()->route('dashboard.posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->created_at = Carbon::parse($post->created_at)->diffForHumans(); // Tambahkan ini

        $recentPosts = Post::where('category', $post->category)
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($post) {
                $post->created_at = Carbon::parse($post->created_at)->diffForHumans();
                return $post;
            });


        $post->share_count = $post->shareCount();

        // Perbaikan logic relevantTopics
        $relevantTopics = Post::where('slug', '!=', $slug)
            ->where(function ($query) use ($post) {
                if ($post->tags) {
                    foreach ($post->tags as $tag) {
                        $query->orWhereJsonContains('tags', $tag);
                    }
                }
            })
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($post) {
                $post->created_at = Carbon::parse($post->created_at)->diffForHumans();
                return $post;
            });

        $bio = 'Pekerjaan Bagi saya bukan soal uang';

        return view('home.blog.show', compact('post', 'recentPosts', 'relevantTopics', 'bio'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('dashboard.admin.posts.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|in:teknologi,kesehatan,hiburan,gaya-hidup,pendidikan,bisnis,pariwisata',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string',
        ]);

        // Update post dengan data validasi
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->category = $validatedData['category'];

        // Menyimpan tags sebagai JSON
        $post->tags = json_encode($validatedData['tags']);

        // Cek apakah ada cover baru yang diupload
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $post->cover = $coverPath;
        }

        // Simpan perubahan pada post
        $post->save();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
