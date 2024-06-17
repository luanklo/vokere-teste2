<h1>Editar o Cliente: {{$client->name}}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('ClientEdit.update', $client->id) }}" method="POST">
    @csrf
    @method('put')

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

    <button type="submit">salvar</button>
</form>