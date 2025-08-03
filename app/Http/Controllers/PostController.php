<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Affiche la liste des articles pour le PUBLIC.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Affiche un article spécifique pour le PUBLIC.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
