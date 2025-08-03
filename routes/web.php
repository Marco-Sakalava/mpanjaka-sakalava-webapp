<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// --- ROUTES PUBLIQUES ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/actions', [PageController::class, 'actions'])->name('actions');
Route::get('/actualites', [PostController::class, 'index'])->name('posts.index');
Route::get('/actualites/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// --- ROUTES PRIVÉES (ADMINISTRATION) ---

// Le middleware 'auth' est suffisant pour le dashboard et le profil
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// On crée un NOUVEAU groupe de routes spécifiquement pour l'admin
// Il nécessite d'être authentifié ET d'être admin.
Route::middleware(['auth', 'verified', IsAdmin::class])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', AdminPostController::class);
        Route::resource('users', AdminUserController::class);
    });
    
});


require __DIR__.'/auth.php';