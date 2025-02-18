<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('home.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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

        $post->tags = json_decode($post->tags, true);

        $recentPosts = Post::where('category', $post->category)
            ->latest()
            ->take(4)
            ->get();

        $relevantTopics = Post::where('slug', '!=', $slug)
            ->whereJsonContains('tags', $post->tags)
            ->latest()
            ->take(4)
            ->get();

        // Mengirim data post, recent posts, dan relevant topics ke view
        return view('home.blog.show', compact('post', 'recentPosts', 'relevantTopics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
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
