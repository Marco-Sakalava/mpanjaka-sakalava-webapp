<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // On importe la façade d'Authentification
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. On vérifie si l'utilisateur est bien connecté ET si son rôle est 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Si c'est le cas, on le laisse passer à la prochaine étape (le contrôleur)
            return $next($request);
        }

        // 2. Si la condition n'est pas remplie, on le redirige
        // On le renvoie sur le tableau de bord avec un message d'erreur.
        return redirect()->route('dashboard')->with('error', 'Accès non autorisé.');
    }
}
