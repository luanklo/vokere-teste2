<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
