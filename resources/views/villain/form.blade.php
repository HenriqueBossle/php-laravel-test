<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $villain?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="power" :value="__('Power')"/>
        <x-text-input id="power" name="power" type="text" class="mt-1 block w-full" :value="old('power', $villain?->power)" autocomplete="power" placeholder="Power"/>
        <x-input-error class="mt-2" :messages="$errors->get('power')"/>
    </div>
    <div>
        <x-input-label for="movie_id" :value="__('Movie Id')"/>
        <x-text-input id="movie_id" name="movie_id" type="text" class="mt-1 block w-full" :value="old('movie_id', $villain?->movie_id)" autocomplete="movie_id" placeholder="Movie Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('movie_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>