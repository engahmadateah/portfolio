<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)
            ->latest()
            ->paginate(6);

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
    
        return view('blog.show', compact('post', 'relatedPosts'));
    }
}