<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Het Open Online Roosendaals Bekertoernooi</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
    <nav x-data="{ open: false }">
            <div class="block fixed top-0 right-0 px-6 py-4 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Aanmelden</a>
                        @endif
                    @endauth
                </div>
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="fixed top-12 right-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Aanmelden</a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif
    </nav>

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    Het Open Online Roosendaals Bekertoernooi

                </div>

                <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">Regels</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">
                                    Je speelt ieder week één match tegen een andere schaker. Deze match bestaat uit twee partijen van 7 minuten + 7 seconden. Is het 1-1, dan speel je een armageddon partij waarbij zwart voldoende heeft aan remise.<br>Verlies je de match? Dan heb je nog een herkansing, je speelt dus altijd tenminste twee matches in het toernooi.
                                    Je kunt dus de finale bereiken met 1 verliesmatch achter je naam. <br>Verlies je voor het eerst in de finale, dan gaat de finale over twee matches!
                                    Er wordt geadviseerd om online te spelen, maar je mag offline spelen wanneer je je houdt aan de richtlijnen van de overheid m.b.t. Corona.<br>
                                    Je kunt de <a href="/reglement.pdf" class="underline">regels</a> hier rustig nalezen<br>
                                    Je kunt <a href="{{route('uitleg2')}}" class="underline">hier uitleg</a> vinden over LiChess en Chess.com
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                            <div class="flex items-center">

                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    Indeling
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">
                                    De indeling wordt iedere maandagavond gepubliceerd. Login op het dashboard om jouw partij te zien en de gegevens van je tegenstander als mede de deelnemers die nog in het toernooi zijn.
                                    Je contactgegevens zijn alleen zichtbaar voor je huidige tegenstander, totdat de partij is gespeeld en de uitslag is doorgegeven.<br>De eerste indeling wordt gemaakt op 1 maart! Meld je dus tijdig aan.
                                    @if(count($games) == 0)
                                        <div class="mt-2 text-gray-600 text-sm">Geen lopende matches</div>
                                    @else
                                        <div class="mt-2 text-gray-600 text-sm underline">Lopende matches</div>

                                        <table>
                                            <thead><tr><th>Speler 1</th><th>Speler 2</th></tr></thead>
                                            @foreach($games as $game)
                                                <tr><td>{{$game->getName($game->wit)}}</td><td>{{$game->getName($game->zwart)}}</td></tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200">
                            <div class="flex items-center">

                                <div class="ml-4 text-lg leading-7 font-semibold">Uitslag doorgeven</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">
                                    Je kunt nadat je hebt ingelogd, ook de uitslag doorgeven. Dit kan de winnende of de verliezende speler doen. Eenmaal doorgegeven, kan het niet meer aangepast worden. Vergeet niet de links naar de partijen op te geven.
                                    Heb je 'offline' gespeeld, stuur dan allebei even een mail naar <a href="mailto:frank@familielambregts.nl">Frank Lambregts</a> als bevestiging van de uitslag.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 md:border-l">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900"><a href="{{ route('register') }}" class="underline">Aanmelden</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">
                                Aanmelden kan door een account aan te maken, geef hierbij je naam op, een e-mailadres en je rating (dat is alvast voor een nieuw toernooi). Je kunt ook je LiChess-gebruikersnaam of Chess.com-gebruikersnaam opgeven. Gebruik bij het aanmelden absoluut niet hetzelfde wachtwoord als een van die accounts. Je weet maar nooit...<br>
                                    <b>Aanmeldingen tot nu toe: </b>{{$count}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">


                            <a href="https://depion.nl" class="ml-1 mr-1 underline">
                                De Pion
                            </a>
                           <a href="https://franklambregts.com" class="ml-1 underline">Frank Lambregts
                            </a>

                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Het Open Online Roosendaals Bekertoernooi
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
