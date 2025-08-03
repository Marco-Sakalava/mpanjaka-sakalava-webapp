<x-dashboard-layout>
    <h2 class="text-2xl font-bold mb-6">Modifier l'article</h2>

    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT') {{-- Indique que c'est une requête de mise à jour --}}

            <!-- Titre de l'article -->
            <div>
                <x-input-label for="title" value="Titre" />
                {{-- On pré-remplit le champ avec la valeur existante --}}
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" required />
            </div>

            <!-- Contenu de l'article -->
            <div>
                <x-input-label for="content" value="Contenu" />
                {{-- On pré-remplit la textarea --}}
                <textarea id="content" name="content" rows="10" class="mt-1 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm">{{ old('content', $post->content) }}</textarea>
            </div>

            <!-- Image de l'article -->
            <div>
                <x-input-label for="image" value="Changer l'image (Optionnel)" />
                <input id="image" name="image" type="file" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                @if ($post->image)
                    <div class="mt-4">
                        <p class="text-sm font-medium">Image actuelle :</p>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Image actuelle" class="mt-2 h-32 w-auto rounded-md">
                    </div>
                @endif
            </div>

            <!-- Bouton de soumission -->
            <div class="flex items-center gap-4">
                <x-primary-button>Mettre à jour</x-primary-button>
            </div>
        </form>
    </div>
</x-dashboard-layout>