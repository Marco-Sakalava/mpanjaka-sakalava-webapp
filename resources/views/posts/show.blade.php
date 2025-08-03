<x-app-layout>
    <article class="bg-white p-8 rounded-lg shadow-lg">
        {{-- On affiche l'image si elle existe --}}
        @if ($post->image)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Image pour {{ $post->title }}" class="w-full h-auto rounded-lg">
            </div>
        @endif

        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

        <div class="text-md text-gray-500 mb-6">
            Publié le {{ $post->created_at->format('d F Y') }}
        </div>

        <div class="prose max-w-none text-lg text-gray-800">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="mt-8">
            <a href="{{ route('posts.index') }}" class="text-red-600 hover:underline font-semibold">
                ← Retour aux actualités
            </a>
        </div>
    </article>
</x-app-layout>
