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

                    <h2 class="text-white text-center">Dados de Login</h2>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
                    </div>

                    <h2 class="text-white text-center">Dados pessoais</h2>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div>
                            <x-label for="cpf" value="{{ __('CPF') }}" />
                            <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autocomplete="cpf" />
                        </div>

                        <div>
                            <x-label for="date_of_birth" value="{{ __('Data de Nascimento') }}" />
                            <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required autocomplete="bdate" />
                        </div>
                    </div>
                    
                    <h2 class="text-white text-center">Endereço</h2>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-label for="street" value="{{ __('Rua') }}" />
                            <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autofocus autocomplete="street" />
                        </div>

                        <div>
                            <x-label for="number" value="{{ __('Numero') }}" />
                            <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autofocus autocomplete="number" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-label for="complement" value="{{ __('Complemento') }}" />
                            <x-input id="complement" class="block mt-1 w-full" type="text" name="complement" :value="old('complement')" required autofocus autocomplete="complement" />
                        </div>
    
                        <div>
                            <x-label for="neighborhood" value="{{ __('Bairro') }}" />
                            <x-input id="neighborhood" class="block mt-1 w-full" type="text" name="neighborhood" :value="old('neighborhood')" required autofocus autocomplete="neighborhood" />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <x-label for="city" value="{{ __('Cidade') }}" />
                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                        </div>
    
                        <div>
                            <x-label for="state" value="{{ __('Estado') }}" />
                            <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autofocus autocomplete="state" />
                        </div>

                        <div>
                            <x-label for="cep" value="{{ __('Cep') }}" />
                            <x-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required autofocus autocomplete="cep" />
                        </div>
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
