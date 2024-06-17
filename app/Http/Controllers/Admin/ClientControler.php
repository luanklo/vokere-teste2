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
}
