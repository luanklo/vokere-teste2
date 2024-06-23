<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientControler;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::put('ClientEdit/{client}/edit', [ClientControler::class, 'update'])->name('ClientEdit.update');
Route::get('ClientEdit/{client}/edit', [ClientControler::class, 'edit'])->name('ClientEdit.edit');
Route::get('ClientDelete/{client}', [ClientControler::class, 'delete'])->name('ClientDelete.delete');
Route::get('Client/{client}', [ClientControler::class, 'view'])->name('Client.view');

Route::post('/ClientForm', [ClientControler::class, 'store'])->name('ClientForm.store');
Route::get('/ClientForm', [ClientControler::class, 'create'])->name('ClientForm.create');
Route::get('/ClientList', [ClientControler::class, 'index'])->name('ClientList.index');
#Route::post('/ClientList', [ClientControler::class, 'filter'])->name('ClientList.filter');