<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <i>Je kunt een LiChess of Chess.com-gebruikersnaam opgeven, zodat je tegenstander je makkelijker kan vinden. Dit is niet verplicht. Gebruik in ieder geval niet hetzelfde wachtwoord.</i>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Naam')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

                <!-- KNSB-rating -->
                <div class="mt-4">
                    <x-label for="rating" :value="__('Rating')" />

                    <x-input id="rating" class="block mt-1 w-full" type="number" name="rating" :value="old('rating')" required />
                </div>

                <!-- Sites -->
                <div class="mt-4">
                    <x-label for="lichess" :value="__('Lichess')" />

                    <x-input id="lichess" class="block mt-1 w-full" type="text" name="lichess" :value="old('lichess')"/>
                </div>
                <div class="mt-4">
                    <x-label for="chesscom" :value="__('Chess.com')" />

                    <x-input id="chesscom" class="block mt-1 w-full" type="text" name="chesscom" :value="old('chesscom')"/>
                </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Wachtwoord')" />


                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Bevestig wachtwoord')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Al aangemeld?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Aanmelden') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
