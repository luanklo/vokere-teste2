<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Clientes</h1>
    
    @if (session()->has('success'))
    {{ session('success') }}
    @endif

    <a href="{{route('ClientForm.create')}}">Novo CLiente</a>

    <table>
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Data de Cadastro</th>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->date_of_birth }}</td>
                    <td>{{ $client->created_at }}</td>
                </tr>
            
                @empty
                <tr>
                    <td colspan="100">Nenhum cliente no bando de dados</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    {{ $clients->links() }}
</body>
</html>