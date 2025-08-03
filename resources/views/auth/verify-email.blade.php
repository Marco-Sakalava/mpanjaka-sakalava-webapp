<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        <p class="font-bold">Merci pour votre inscription !</p>
        <p class="mt-2">Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ? Si vous n'avez pas reçu l'e-mail, nous nous ferons un plaisir de vous en envoyer un autre.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{-- Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription. --}}
            Un nouveau lien de vérification a été envoyé à l'adresse e-mail fournie lors de votre inscription.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Renvoyer l'e-mail de vérification
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Se déconnecter
            </button>
        </form>
    </div>
</x-guest-layout>