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
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                        <div class="p-6 bg-white border-b border-gray-200">
                    @isset($partij)

                        <a href="/speler/{{$partij->wit}}" class="underline">{{$partijnaam_wit->name}}</a> - <a href="/speler/{{$partij->zwart}}" class="underline">{{$partijnaam_zwart->name}}</a> <br>
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
                                    <option value="1">{{$partijnaam_wit->name}} wint</option>
                                    <option value="2">{{$partijnaam_zwart->name}} wint</option>
                                </select>
                            </div>
                            <div>
                            <x-button class="mt-2">
                                {{ __('Dien uitslag in') }}
                            </x-button>
                            </div>
                        </form>
                    @else
                        Je hebt geen partijen waarvoor je de uitslag hoeft in te dienen. Bekijk je vorige partijen in de historie.
                    @endisset
                        </div>
                    </div>
            @endcan
                @isset($deelnemers)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <b>Deelnemers nog in het toernooi</b><hr>
                        <table>
                            <thead><tr><th>Naam</th></tr></thead>
                            <tbody>
                            @foreach($deelnemers as $deelnemer)
                                <tr><td>{{$deelnemer->user->name}}</td></tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    @endisset
        </div>
    </div>
</x-app-layout>
