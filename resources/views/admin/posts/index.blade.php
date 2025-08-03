<x-dashboard-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Gestion des Actualités</h2>
        <a href="{{ route('admin.posts.create') }}" class="bg-red-600 text-white font-bold py-2 px-4 rounded-md hover:bg-red-700 transition">
            Créer un article
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr class="text-left">
                    <th class="p-4">Titre</th>
                    <th class="p-4 hidden md:table-cell">Date de Création</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="border-b border-gray-200">
                        <td class="p-4 font-semibold">{{ $post->title }}</td>
                        <td class="p-4 hidden md:table-cell">{{ $post->created_at->format('d/m/Y') }}</td>
                        <td class="p-4 text-right">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:underline mr-4">Modifier</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
</form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-4 text-center text-gray-500">
                            Aucun article trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-dashboard-layout>