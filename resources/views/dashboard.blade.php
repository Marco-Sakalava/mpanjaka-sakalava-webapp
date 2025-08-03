{{-- On utilise notre nouveau layout de dashboard --}}
<x-dashboard-layout>
    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
        <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-bold">
                {{ __("Bienvenue,") }} {{ Auth::user()->name }} !
            </h2>

            <p class="mt-4">
                Vous êtes connecté à votre tableau de bord.
            </p>
            <p class="mt-2">
                Utilisez le menu sur la gauche pour naviguer vers les différentes sections.
            </p>
        </div>
    </div>
</x-dashboard-layout>
