<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        # Rua, Número, Complemento, Bairro, Cidade, Estado, CEP
        #id, street, number, complement, neighborhood, city, state, cep, created_at, updated_at
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'cep',
    ];
}
