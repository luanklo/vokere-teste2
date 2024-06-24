<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ClientControler extends Controller
{   

    public function index(Request $filter){
    $clients = User::query();

    if (!empty($request->name)) {
        $clients->where('name', 'like', $filter->name.'%');
    }

    if (!empty($request->created_at)) {
        $clients->whereDate('created_at', '=', $filter->created_at);
    }

    $clients = $clients->paginate();

    return view('Admin.ClientList', compact('clients','filter'));
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

    public function view(Request $request, string $id)
    {
        if (!$client = User::find($id)) {
            return redirect()->route('ClientList.index')->with('message', 'Cliente não encontrado');
        }

        return view('Admin.Client', compact('client'));
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

    public function delete(Request $request, string $id)
    {
        if (!$client = User::find($id)) {
            return back()->with('message', 'Cliente não encontrado');
        }

        $client->delete();

        return redirect()
            ->route('ClientList.index')
            ->with('success', 'Cliente deletado com sucesso');
    }
}
