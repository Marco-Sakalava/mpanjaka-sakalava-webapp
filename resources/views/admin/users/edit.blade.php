<x-dashboard-layout>
    <h2 class="text-2xl font-bold mb-6">Modifier le rôle de {{ $user->name }}</h2>

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Email (pour information, non modifiable) -->
            <div class="mb-4">
                <x-input-label for="email" value="Adresse Email" />
                <x-text-input id="email" type="email" class="mt-1 block w-full bg-gray-100" :value="$user->email" disabled />
            </div>

            <!-- Liste déroulante des rôles -->
            <div class="mb-6">
                <x-input-label for="role" value="Rôle de l'utilisateur" />
                <select name="role" id="role" class="block w-full mt-1 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm">
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                            {{ ucfirst($role) }} {{-- Met la première lettre en majuscule --}}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex items-center gap-4">
                <x-primary-button>Mettre à jour le rôle</x-primary-button>
                <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">Annuler</a>
            </div>
        </form>
    </div>
</x-dashboard-layout>
