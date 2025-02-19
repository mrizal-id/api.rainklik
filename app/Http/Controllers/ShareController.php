<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'platform' => 'required|string',
        ]);

        $post->shares()->create($request->all());

        return response()->json(['success' => true]);
    }
}
