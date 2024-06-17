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

Route::get('CleintForm/{client}/edit', [ClientControler::class, 'edit'])->name('CleintForm.edit');
Route::post('/CleintForm', [ClientControler::class, 'store'])->name('ClientForm.store');
Route::get('/CleintForm', [ClientControler::class, 'create'])->name('ClientForm.create');
Route::get('/ClientList', [ClientControler::class, 'index'])->name('ClientList.index');