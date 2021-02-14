<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($speler)
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                <div class="p-6 bg-white border-b border-gray-200">
Je bent ingelogd. Hier kun je gegevens zien en uitslagen doorgeven. Doe je mee met een toernooi, kun je ook de gegevens van je tegenstander zien.

                </div>
            </div>
            @endisset
            @can('uitslag doorgeven')



                    @isset($partij)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                            <div class="p-6 bg-white border-b border-gray-200">
                   @empty($partij)
                       Je hebt geen partijen waar je een uitslag voor hoeft door te geven.
                    @else
                        <a href="/speler/{{$partij->wit}}" class="underline">{{$partij->wit}}</a> - <a href="/speler/{{$partij->zwart}}" class="underline">{{$partij->zwart}}</a> <br>
                        <form method="post" action="{{ route('uitslag') }}">
                            @csrf
                            <input id="id" name="id" type="hidden" value="{{$partij->id}}" />
                            <div>
                                <x-label for="links" :value="__('Links')" />
                                <i>Vul hier de verschillende links naar de partijen in. Doe dit met een komma er tussen</i>

                                <x-input id="links" class="block mt-1 w-full" type="text" name="links" :value="old('links')" />
                            </div>
                            <div>
                                <x-label for="uitslag" :value="__('Uitslag')" />
                                <select name="uitslag" id="uitslag" :value="old('uitslag')">
                                    <option value="1">{{$partij->wit}} wint</option>
                                    <option value="2">{{$partij->zwart}} wint</option>
                                </select>
                            </div>
                            <div>
                            <x-button class="mt-2">
                                {{ __('Dien uitslag in') }}
                            </x-button>
                            </div>
                        </form>

                    @endempty
                            </div>
                        </div>
                        @endisset
                    @isset($speler)
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                                <div class="p-6 bg-white border-b border-gray-200">
                        @if($speler === "Ongeldig")
                            Jij mag de gegevens van deze speler niet bekijken.
                            @else

                        Je tegenstander is: {{$speler->name}}.<br>
                        Je kunt hem bereiken via de volgende methodes:<br>
                        E-mail: {{$speler->email}}<br>
                        LiChess: {{$speler->lichess}}<br>
                        Chess.com: {{$speler->chesscom}}<br>
                  @endif
                                </div>
                            </div>

                        @endisset

            @endcan
                @isset($deelnemers)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <b>Deelnemers nog in het toernooi</b><hr>
                        @foreach($deelnemers as $deelnemer)
                            {{$deelnemer->user->name}}<hr>
                        @endforeach
                    </div>
                </div>
                    @endisset
        </div>
    </div>
</x-app-layout>
