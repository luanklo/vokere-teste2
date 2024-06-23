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
                <form action="{{ route('ClientEdit.update', $client->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('put')

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $client->name }}"/>
                    </div>
            
                    <div class="mt-4">
                        <x-label for="cpf" value="{{ __('CPF') }}" />
                        <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" value="{{ $client->cpf }}"/>
                    </div>
            
                    <div class="mt-4">
                        <x-label for="date_of_birth" value="{{ __('Data de Nascimento') }}" />
                        <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" value="{{ $client->date_of_birth }}"/>
                    </div>
            
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $client->email }}"/>
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
