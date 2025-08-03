<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tableau de bord - {{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Content -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="md:flex md:items-start md:space-x-6">

                {{-- Colonne de la barre latérale --}}
                <aside class="md:w-1/4 mb-8 md:mb-0">
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <h3 class="font-bold text-lg mb-4">Menu</h3>
                        <nav class="space-y-2">
                            <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-red-600 font-semibold">Tableau de bord</a>
                            <a href="{{ route('profile.edit') }}" class="block text-gray-700 hover:text-red-600">Mon Profil</a>
                            <a href="{{ route('admin.posts.index') }}" class="block text-gray-700 hover:text-red-600 font-semibold">Gérer les articles</a>
                            <a href="{{ route('admin.users.index') }}" class="block text-gray-700 hover:text-red-600 font-semibold">Gérer les membres</a>
                        </nav>
                    </div>
                </aside>

                {{-- [CORRECTION] Colonne du contenu principal --}}
                <main class="md:w-3/4">
                    
                    {{-- On affiche les messages de succès --}}
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                            <p class="font-bold">Succès</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- On affiche les messages d'erreur --}}
                    @if (session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                            <p class="font-bold">Erreur</p>
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    {{-- Le slot n'est appelé qu'une seule fois --}}
                    {{ $slot }}

                </main>

            </div>
        </div> 
    </div>
</body>
</html>
