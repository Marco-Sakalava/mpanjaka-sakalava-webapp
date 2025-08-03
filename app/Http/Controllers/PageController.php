<?php

namespace App\Http\Controllers;

use App\Models\Post; // <-- On importe le modèle Post
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // On récupère les 5 derniers articles publiés
        $latestPosts = Post::latest()->take(5)->get();

        // On passe la variable $latestPosts à la vue 'welcome'
        return view('welcome', compact('latestPosts'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function actions()
    {
        return view('actions');
    }
}
