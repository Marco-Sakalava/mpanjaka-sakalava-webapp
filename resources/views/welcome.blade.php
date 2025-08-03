<x-app-layout>
    <div class="space-y-20">

        <!-- Section 1 : Logo -->
        <section class="flex justify-center">
            <img src="{{ asset('images/logo-mpanjaka.png') }}" alt="Logo de l'association Mpanjaka Sakalava" class="h-48">
        </section>

        <!-- Section 2 : Notre Mission -->
        <section>
            <h2 class="text-4xl font-bold text-center mb-10">Notre Mission</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-2">Solidarité et Unité</h3>
                    <p>Réveiller la solidarité des Mpanjaka Manjaka Sakalava et des membres de la Famille Princière.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-2">Culture Royale</h3>
                    <p>Promouvoir les cultures traditionnelles Royales et l'entraide socioculturelle entre les membres et les peuples sakalava.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-2">Développement</h3>
                    <p>Participer au développement économique, social et culturel du peuple sakalava et à la lutte contre la pauvreté dans tout Madagascar.</p>
                </div>
            </div>
        </section>

        <!-- Section 3 : Le Bureau Permanent -->
        <section class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-4xl font-bold text-center mb-8">Le Bureau Permanent</h2>
            <div class="text-center max-w-2xl mx-auto">
                <p class="mb-2"><span class="font-bold">Président :</span> Mr TSIARASO IV Rachid</p>
                <p class="mb-2"><span class="font-bold">Vices-Présidents :</span> Mr KAMAMY Piero et Mme VOLANDIANA Elisabeth</p>
                <p class="mb-2"><span class="font-bold">Trésorier :</span> Mr ATHANASE Abdallah</p>
                <p class="mb-2"><span class="font-bold">Secrétaire Général :</span> Mme RAMBELOSON Volamasy Claudia</p>
                <p class="mt-4 text-sm text-gray-600">(Conformément au procès-verbal de l'assemblée constitutive du 06 juillet 2025)</p>
            </div>
        </section>
        
        <!-- Section 4 : Dernières Actualités -->
        <section>
            <h2 class="text-4xl font-bold text-center mb-10">Dernières Actualités</h2>
            <div class="space-y-8">
                @forelse ($latestPosts as $post)
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-1">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-red-600">{{ $post->title }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-3">Publié le {{ $post->created_at->format('d/m/Y') }}</p>
                        <p class="text-gray-700">{{ Str::limit($post->content, 150) }}</p>
                    </div>
                @empty
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <p class="text-gray-600">Aucune actualité à afficher pour le moment.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('posts.index') }}" class="inline-block bg-red-600 text-white font-bold py-2 px-6 rounded-md hover:bg-red-700 transition">Voir toutes les actualités</a>
            </div>
        </section>

    </div>
</x-app-layout>