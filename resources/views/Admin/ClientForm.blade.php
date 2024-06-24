<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Cliente') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Algo deu errado.</span>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('ClientForm.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="mt-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                                <!-- Profile Photo File Input -->
                                <input type="file" id="photo" class="hidden" name='profile_photo_path'
                                            wire:model.live="photo"
                                            x-ref="photo"
                                            x-on:change="
                                                    photoName = $refs.photo.files[0].name;
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        photoPreview = e.target.result;
                                                    };
                                                    reader.readAsDataURL($refs.photo.files[0]);
                                            " />
                                <x-label for="photo" value="{{ __('Photo') }}" />
                                <!-- Current Profile Photo -->
                                <div class="mt-2" x-show="! photoPreview">
                                    {{-- <img src="{{ $client->profile_photo_url }}" alt="{{ $client->name }}" class="rounded-full h-20 w-20 object-cover"> --}}
                                    <img src="{{ Null }}" alt="{{ Null }}" class="rounded-full h-20 w-20 object-cover">
                                </div>
                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </div>
                                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                    {{ __('Select A New Photo') }}
                                </x-secondary-button>
                                {{-- @if ($client->profile_photo_path)
                                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                        {{ __('Remove Photo') }}
                                    </x-secondary-button>
                                @endif --}}
                                <x-input-error for="photo" class="mt-2" />
                            </div>
                        @endif
                    </div>

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
            
                    <div class="mt-4">
                        <x-label for="cpf" value="{{ __('CPF') }}" />
                        <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autocomplete="cpf" />
                    </div>
            
                    <div class="mt-4">
                        <x-label for="date_of_birth" value="{{ __('Data de Nascimento') }}" />
                        <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required autocomplete="bdate" />
                    </div>
            
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
            
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end">
                        <a
                            href="{{ route('ClientList.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                        >
                            Cancelar
                        </a>

                        <x-button class="ml-4">
                            {{ __('Salvar') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
