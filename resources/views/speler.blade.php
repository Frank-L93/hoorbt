
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Dashboard') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
@can('uitslag doorgeven')
@isset($speler)
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
        <div class="p-6 bg-white border-b border-gray-200">
            @if($speler === "Ongeldig")
                Jij mag de gegevens van deze speler niet bekijken.
            @elseif($speler === "Geen partij")
                Je hebt momenteel geen partij meer dus je kunt geen spelergegevens niet bekijken.
                @else
                <table>
                    <thead><tr><th>Naam</th><th>Mail</th><th>LiChess</th><th>Chess.com</th></tr></thead>
                    <tbody><tr><td>{{$speler->name}}</td><td>{{$speler->email}}</td><td>{{$speler->lichess}}</td><td>{{$speler->chesscom}}</td></tr></tbody>
                </table>
            @endif
        </div>
    </div>

@endisset
@endcan
    </div></div>
</x-app-layout>

