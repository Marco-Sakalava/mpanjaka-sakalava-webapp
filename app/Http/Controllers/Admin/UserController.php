<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // On récupère tous les utilisateurs sauf l'admin actuellement connecté
    // pour éviter qu'il ne se modifie lui-même par accident sur cette page.
    $users = User::where('id', '!=', auth()->id())->get();
    
    return view('admin.users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // On récupère la liste de tous les rôles possibles pour la liste déroulante
        $roles = ['admin', 'fondateur', 'membre'];
    
        return view('admin.users.edit', compact('user', 'roles'));
    }
    
    /**
     * Met à jour le rôle de l'utilisateur dans la base de données.
     */
    public function update(Request $request, User $user)
    {
        // 1. Validation : le rôle envoyé doit être l'un de ceux que nous autorisons.
        $request->validate([
            'role' => 'required|in:admin,fondateur,membre',
        ]);
    
        // 2. Mise à jour de l'utilisateur
        $user->update([
            'role' => $request->role,
        ]);
    
        // 3. Redirection avec un message de succès
        return redirect()->route('admin.users.index')->with('success', 'Le rôle de l\'utilisateur a été mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
