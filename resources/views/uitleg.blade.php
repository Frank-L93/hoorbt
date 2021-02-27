<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uitleg LiChess / Chess.com') }}
        </h2>
    </x-slot>
    <div x-data="{show: false, show2: false}" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div @click="show = !show" class="text-gray-900 font-semibold underline">LiChess</div>
                    <div x-show="show" class="mt-2">
                    <i>Hoe daag je je tegenstander met Account uit op LiChess?</i>
                    <ul class="list-decimal list-inside">
                        <li>Zoek je tegenstander boven in het scherm
                            <img src="/LiChess1.png">
                        </li>
                        <li>Op de profielpagina van de speler klik op het volgende icoon (dit is niet het icoon naast waar je net hebt gezocht!)
                            <img src="/LiChess2.png">
                        </li>
                        <li>Er komt een nieuw scherm, stel deze zo in als getoond hieronder en kies de middelste koning, dan wordt de eerste partij de kleur bepaald door de computer.
                            <img src="/LiChess3.png">
                            <i>Voor een Armageddon partij waarbij wit 5 minuten heeft en zwart 4 minuten heeft, stel je de klok in op 4 minuten. Als je <a href="https://lichess.org/account/preferences/chess-clock" class="underline">instellingen</a> op LiChess goed staan kun je zodra de partij begint als zwart zijnde wit 4x 15 seconden extra geven.</i>
                        </li>
                        <li>De speler uitgedaagd wordt, krijgt daar een melding van naast zijn naam.
                            <img src="/LiChess4.png">
                        </li>
                    </ul>
                    <i>Hoe daag je je tegenstander zonder Account uit op LiChess?</i>
                    Op de voorpagina kun je ook direct klikken op "Speel tegen een vriend". Als je de klok hebt ingesteld, krijg je een link die je kunt delen. Je kunt deze link eenmalig gebruiken! Sluit deze pagina dan ook niet. Zodra je tegenstander op de gedeelde link drukt, start de partij automatisch.
                </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div @click="show2 = !show2" class="text-gray-900 font-semibold underline">Chess.com</div>
                    <div x-show="show2" class="mt-2">
                        <i>Hoe daag je je tegenstander uit op Chess.com</i>
                        <ul class="list-decimal list-inside">
                            <li>Ga naar Play/Spelen & dan de eerste optie
                                <img src="/chess1.jpg">
                            </li>
                            <li>Kies dan de tijd, aan de rechterkant
                            <img src="/chess2.png">
                            </li>
                            <li>Klik op meer en vul onderin 7 en 7 in en bevestig met OK
                                <img src="/chess3.png"><br/>
                                <img src="/chess4.png">
                            </li>
                            <li>Kies daarna Play a Friend.
                                <img src="/chess5.png">
                            </li>
                            <li>Je hebt drie mogelijkheden, ben je al vrienden op Chess.com kun je uit de lijst van vrienden kiezen. Anders kun je zoeken op gebruikersnaam of een Challenge Link aanmaken en deze delen.
                                <img src="/chess6.png">
                            </li>
                            <li>Een armageddon partij op Chess.com is lastiger. Daarvoor moet je juist 5 minuten kiezen en geduldig wachten; Geeft Chess.com aan dat je wel moet zetten? Zet dan snel. Armageddon-partijen worden aangeraden op LiChess te spelen.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
