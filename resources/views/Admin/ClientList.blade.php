<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Sucesso!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div>
                    <form action="{{ route('ClientListFilter.filter') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-label for="name" :value="__('Filtro')" />
                                <x-input id="name" class="mt-1 ml-2 w-full" type="text" name="name"/>
                            </div>
                            <div>
                                <x-label for="created_at" :value="__('Data')" />
                                <x-input id="created_at" class="mt-1 ml-2 w-full" type="date" name="created_at"/>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <x-button>
                                {{ __('Pesquisar') }}
                            </x-button>
                            <a
                                href="{{ route('ClientForm.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                            >
                                Novo Cliente
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="px-6 py-4 text-white border-b text-left dark:border-gray-700">ID</th>
                            <th class="px-6 py-4 text-white border-b text-left dark:border-gray-700">Nome</th>
                            <th class="px-6 py-4 text-white border-b text-left dark:border-gray-700">Data de Nascimento</th>
                            <th class="px-6 py-4 text-white border-b text-left dark:border-gray-700">Data de Cadastro</th>
                            <th class="px-6 py-4 text-white border-b text-left dark:border-gray-700">Ações</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <td class="px-6 py-4 text-white border-b text-center dark:border-gray-700">{{ $client->id }}</td>
                                <td class="px-6 py-4 text-white border-b text-center dark:border-gray-700">{{ $client->name }}</td>
                                <td class="px-6 py-4 text-white border-b text-center dark:border-gray-700">{{ DateTime::createFromFormat('Y-m-d', $client->date_of_birth )->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-white border-b text-center dark:border-gray-700">{{ DateTime::createFromFormat('Y-m-d H:i:s', $client->created_at )->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-white border-b text-center dark:border-gray-700">
                                    <a
                                        href="{{ route('Client.view', $client->id) }}"
                                        class="text-white bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest "
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('ClientEdit.edit', $client->id) }}"
                                        class="text-white bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest "
                                    >
                                        Edição
                                    </a>

                                    <a
                                        href="{{ route('ClientDelete.delete', $client->id) }}"
                                        class="text-white bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest "
                                    >
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-gray-500 dark:text-gray-400">Nenhum cliente no banco de dados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
