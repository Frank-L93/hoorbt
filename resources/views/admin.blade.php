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
                                        <option value="{{$user}}">{{$user}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Zwart -->
                            <div>
                                <x-label for="zwart" :value="__('Zwart')" />
                                <select name="zwart" id="zwart" :value="old('zwart')" required>>
                                    @foreach($users as $user)
                                        <option value="{{$user}}">{{$user}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-button class="ml-4">
                                {{ __('Voeg partij toe') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            @endcan
                @can('toevoegen toernooipartij')
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @foreach($toernooistanden as $toernooistand)
                                {{$toernooistand->name}} | {{$toernooistand->verloren}} <br>
                                @endforeach
                        </div>
                    </div>
                    @endcan
                @can('toevoegen toernooipartij')
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @foreach($toernooipartijen as $toernooipartij)
                                Partij: {{$toernooipartij->wit}} - {{$toernooipartij->zwart}} <br>
                                Links: {{$toernooipartij->links}}<br>
                                Uitslag: {{$toernooipartij->uitslag}}<hr>
                            @endforeach
                        </div>
                    </div>
                @endcan
        </div>
    </div>
</x-app-layout>
