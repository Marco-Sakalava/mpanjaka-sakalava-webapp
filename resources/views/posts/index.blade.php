
<x-app-layout>
    <div class="space-y-12">
        <h1 class="text-4xl font-bold text-center">Actualités de l'Association</h1>
        
        @if ($posts->count())

            {{-- LA BOUCLE EST CONSERVÉE --}}
            @foreach ($posts as $post)
    <article class="flex flex-col sm:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden">
        
        <div class="w-full sm:w-2/5 {{ $loop->even ? 'sm:order-last' : '' }}">
            <a href="{{ route('posts.show', $post->slug) }}">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image pour {{ $post->title }}" class="object-cover w-full h-64 sm:h-full">
                @else
                    <div class="bg-gray-200 w-full h-64 sm:h-full flex items-center justify-center">
                        <span class="text-gray-500">Pas d'image</span>
                    </div>
                @endif
            </a>
        </div>
        
        <div class="w-full sm:w-3/5 p-8">
            <h2 class="text-2xl font-bold mb-2">
                <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-red-600">
                    {{ $post->title }}
                </a>
            </h2>
            <div class="text-sm text-gray-500 mb-4">
                Publié le {{ $post->created_at->format('d/m/Y') }}
            </div>
            <p class="text-gray-700 leading-relaxed">
                {{ Str::limit($post->content, 250) }}
            </p>
            <div class="mt-6">
                <a href="{{ route('posts.show', $post->slug) }}" class="font-semibold text-red-600 hover:text-red-800">
                    Lire la suite →
                </a>
            </div>
        </div>
        
    </article>
@endforeach
            {{-- FIN DE LA BOUCLE --}}


            {{-- La pagination reste en dehors de la boucle --}}
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
            
        @else
            <p class="text-center text-gray-700">Aucune actualité à afficher pour le moment.</p>
        @endif
    </div>
</x-app-layout>