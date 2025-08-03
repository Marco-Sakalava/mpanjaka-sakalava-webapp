<x-dashboard-layout>
    <h2 class="text-2xl font-bold mb-6">Gestion des Membres</h2>

    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr class="text-left">
                    <th class="p-4">Nom</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Rôle</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b border-gray-200">
                        <td class="p-4 font-semibold">{{ $user->name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4"><span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $user->role }}</span></td>
                        <td class="p-4 text-right">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Modifier le rôle</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            Aucun autre utilisateur trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
