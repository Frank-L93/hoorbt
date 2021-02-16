<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table-auto">
                            <thead><tr><th>Speler 1</th><th>Speler 2</th><th>Uitslag</th><th>Links</th></tr></thead>
                            <tbody>
                        @foreach($partij as $party)

                                <tr><td>{{$party->getName($party->wit)}}</td><td>{{$party->getName($party->zwart)}}</td><td>@if($party->uitslag == 1) Speler 1 heeft gewonnen @elseif($party->uitslag == 2) Speler 2 heeft gewonnen @else Er is nog geen uitslag bekend.@endif</td><td>@foreach(explode(',', $party->links) as $link)<a href="{{$link}}" class="underline">{{$link}}</a>  @endforeach</td></tr>
                        @endforeach</tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
