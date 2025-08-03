<x-dashboard-layout>
    <h2 class="text-2xl font-bold mb-6">Créer un nouvel article</h2>

    <div class="bg-white p-8 rounded-lg shadow-lg">
        {{-- La route 'admin.posts.store' est celle qui va traiter les données --}}
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf  {{-- Protection CSRF obligatoire pour les formulaires Laravel --}}

            <!-- Titre de l'article -->
            <div>
                <x-input-label for="title" value="Titre" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
            </div>

            <!-- Contenu de l'article -->
            <div>
                <x-input-label for="content" value="Contenu" />
                <textarea id="content" name="content" rows="10" class="mt-1 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm"></textarea>
            </div>

            <!-- Image de l'article -->
            <div>
                <x-input-label for="image" value="Image d'illustration (Optionnel)" />
                <input id="image" name="image" type="file" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                <p class="mt-1 text-sm text-gray-500">PNG, JPG, WEBP (MAX. 2Mo).</p>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex items-center gap-4">
                <x-primary-button>Publier l'article</x-primary-button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
