<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ClientControler extends Controller
{
    public function index()
    {   
        $clients = User::paginate();//User::all();
        return view('Admin.ClientList', compact('clients'));
    }

    public function create()
    {
        return view('Admin.ClientForm');
    }

    public function store(StoreClientRequest $request)
    {
        User::create($request->all());

        return redirect()
            ->route('ClientList.index')
            ->with('success', 'Cliente cadastrado com sucesso');
    }

    public function edit(string $id)
    {
        //$user = User::where('id', '=', $id)->first();
        //$user = User::where('id', $id)->first(); // firstOrFail();
        if (!$client = User::find($id)) {
            return redirect()->route('ClientList.index')->with('message', 'Cliente não encontrado');
        }

        return view('Admin.ClientEdit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        if (!$client = User::find($id)) {
            return back()->with('message', 'Cliente não encontrado');
        }

        $client->update($request->all());

        return redirect()
            ->route('ClientList.index')
            ->with('success', 'Cliente atualizado com sucesso');
    }
}
