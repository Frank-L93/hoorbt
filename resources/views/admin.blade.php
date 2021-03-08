<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('toevoegen toernooipartij')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('toernooipartij') }}">
                        @csrf

                        <!-- Wit -->
                            <div>
                                <x-label for="wit" :value="__('Wit')" />
                                <select name="wit" id="wit" :value="old('wit')" required>

                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Zwart -->
                            <div>
                                <x-label for="zwart" :value="__('Zwart')" />
                                <select name="zwart" id="zwart" :value="old('zwart')" required>>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                    <option value="Bye">Bye(win)</option>
                                    <option value="Afwezig">Bye(verlies)</option>
                                </select>
                            </div>
                            <x-button class="mt-2">
                                {{ __('Voeg partij toe') }}
                            </x-button>
                        </form>
                    </div>
                </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table>
                                <thead><tr><th>Naam</th><th>Aantal keer verloren</th><th>Rating</th><th>E-mail</th><th>LiChess</th><th>Chess.com</th></tr></thead>
<tbody>
                            @foreach($toernooistanden as $toernooistand)
                                <tr><td>{{$toernooistand->user->name}}</td><td>{{$toernooistand->verloren}}</td> <td>{{$toernooistand->user->rating}}</td><td>{{$toernooistand->user->email}}</td><td>{{$toernooistand->user->lichess}}</td><td>{{$toernooistand->user->chesscom}}</td></tr>
                                @endforeach
</tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table>
                            <thead><tr><th>Speler 1</th><th>Speler 2</th><th>Uitslag</th><th>Links</th></tr></thead>
                            <tbody>
                            @foreach($toernooipartijen as $party)

                                <tr><td>{{$party->getName($party->wit)}}</td><td>{{$party->getName($party->zwart)}}</td><td>@if($party->uitslag == 1) Speler 1 heeft gewonnen @elseif($party->uitslag == 2) Speler 2 heeft gewonnen @elseif($party->uitslag == 3) Partij is niet op tijd gespeeld en beide spelers hebben een verloren partij. @else Er is nog geen uitslag bekend.@endif</td><td>@foreach(explode(',', $party->links) as $link)<a href="{{$link}}" class="underline">{{$link}}</a>  @endforeach</td></tr>
                            @endforeach</tbody>
                            </table>
                        </div>
                    </div>
                @endcan
        </div>
    </div>
</x-app-layout>
