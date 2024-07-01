<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(array $input): Address
    {
        # id, street, number, complement, neighborhood, city, state, cep, created_at, updated_at
        Validator::make($input, [
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'complement' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'min:8', 'max:8'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(Address::create([
                'street' => $input['street'],
                'number' => $input['number'],
                'complement' => $input['complement'],
                'neighborhood' => $input['neighborhood'],
                'city' => $input['city'],
                'state' => $input['state'],
                'cep' => $input['cep'],
            ]), function () {});
        });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}