<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // <-- CETTE LIGNE EST CRUCIALE


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Affiche le formulaire de création d'un nouvel article.
     */
    public function create()
    {
        // Retourne simplement la vue qui contient notre formulaire
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // Image optionnelle, doit être une image, max 2Mo
        ]);

        // 2. Gestion de l'image (si elle existe)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // On stocke l'image dans `storage/app/public/posts` et on récupère son chemin
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        // 3. Création de l'article en base de données
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title), // On génère le slug à partir du titre
            'image' => $imagePath,
        ]);

        // 4. Redirection vers la liste des articles avec un message de succès
        return redirect()->route('admin.posts.index')->with('success', 'Article créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
{
    // On retourne la vue 'edit' et on lui passe l'article à modifier
    return view('admin.posts.edit', compact('post'));
}

/**
 * Met à jour un article dans la base de données.
 */
public function update(Request $request, Post $post)
{
    // 1. Validation (similaire à store, mais le titre peut être le même)
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    // 2. Gestion de la nouvelle image (si elle existe)
    $imagePath = $post->image; // On garde l'ancienne image par défaut
    if ($request->hasFile('image')) {
        // On supprime l'ancienne image pour ne pas encombrer le disque
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        // On stocke la nouvelle image
        $imagePath = $request->file('image')->store('posts', 'public');
    }

    // 3. Mise à jour de l'article
    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'slug' => Str::slug($request->title),
        'image' => $imagePath,
    ]);

    // 4. Redirection avec un message de succès
    return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour avec succès !');
}

    /**
     * Remove the specified resource from storage.
     */
          
     public function destroy(string $slug)
     {
         // 1. On trouve l'article à partir de son slug
         $post = Post::where('slug', $slug)->firstOrFail();
     
         // 2. On supprime l'image associée s'il y en a une
         if ($post->image) {
             Storage::disk('public')->delete($post->image);
         }
     
         // 3. On supprime l'article de la base de données
         $post->delete();
     
         // 4. On redirige avec un message de succès
         return redirect()->route('admin.posts.index')->with('success', 'Article supprimé avec succès !');
     }
}
