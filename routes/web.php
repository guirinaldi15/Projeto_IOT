<?php

use App\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota principal (raiz) renderizando o componente Livewire diretamente
Route::get('/dashboard', Dashboard::class);