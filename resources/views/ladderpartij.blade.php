<form method="POST" action="{{ route('ladderpartij') }}">
@csrf

<!-- Wit -->
    <div>
        <x-label for="wit" :value="__('Wit')" />

        <x-input id="wit" class="block mt-1 w-full" type="text" name="wit" :value="old('wit')" required autofocus />
    </div>
    <!-- Zwart -->
    <div>
        <x-label for="zwart" :value="__('Zwart')" />

        <x-input id="zwart" class="block mt-1 w-full" type="text" name="zwart" :value="old('zwart')" required />
    </div>
    <!-- Uitslag -->
    <div>
        <x-label for="uitslag" :value="__('Uitslag')"/>

        <select name="uitslag" id="uitslag" :value="old('uitslag')" required>
            <option value="1">1-0</option>
            <option value="2">0.5-0.5</option>
            <option value="3">0-1</option>
        </select>
    </div>
    <x-button class="ml-4">
        {{ __('Dien uitslag in') }}
    </x-button>
</form>
