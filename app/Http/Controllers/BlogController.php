<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)
            ->when(request('search'), function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . request('search') . '%')
                      ->orWhere('excerpt', 'like', '%' . request('search') . '%');
                });
            })
            ->latest()
            ->paginate(7)
            ->withQueryString();

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        abort_if(!$post->published, 404);
    
        $relatedPosts = Post::where('published', true)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        $setting = Setting::first();

        return view('blog.show', compact('post', 'relatedPosts', 'setting'));
    }
}