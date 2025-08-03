<x-app-layout>
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-4xl font-bold text-center mb-8">Nous Contacter</h2>

        <div class="grid md:grid-cols-2 gap-10">
            <!-- Informations de contact -->
            <div>
                <h3 class="text-2xl font-semibold mb-4">Informations</h3>
                <p class="mb-3">
                    <span class="font-bold block">Association Fi.A.Ma.Sa.M</span>
                    FIKAMBANAN'AMPANJA MANJAKA SAKALAVA ETO MADAGASIKARA
                </p>
                <p class="mb-3">
                    <span class="font-bold block">Adresse du siège social :</span>
                    Lot: VS 21 HJ TER A Bis<br>
                    Ambalabe, Ambolokandrina<br>
                    Antananarivo (101)<br>
                    Madagascar
                </p>
                <p class="mb-3">
                    <span class="font-bold block">Email :</span>
                    {{-- Correction de la couleur du lien email --}}
                    <a href="mailto:contact@fiamesam.mg" class="text-red-600 hover:underline">contact@fiamesam.mg</a>
                    
                </p>
                <p>
                    <span class="font-bold block">Téléphone :</span>
                    +261 38 38 102 40
                </p>
            </div>

            <!-- Formulaire de contact (placeholder) -->
            <div>
                <h3 class="text-2xl font-semibold mb-4">Envoyez-nous un message</h3>
                <p class="text-gray-600">
                    Un formulaire de contact sera bientôt disponible ici pour nous joindre directement depuis le site.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
