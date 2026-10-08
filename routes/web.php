<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteIndex;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota principal (raiz) renderizando o componente Livewire diretamente
Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('sensores/create', SensorCreate::class)->name('sensores.create');
Route::get('/sensor/edit', SensorEdit::class)->name('sensores.edit');
Route::get('/sensor/index', SensorIndex::class)->name('sensores.index');

Route::get('ambientes/create', AmbienteCreate::class)->name('ambientes.create');
Route::get('ambientes/index', AmbienteIndex::class)->name('ambientes.index');
Route::get('/ambiente/edit', AmbienteEdit::class)->name('ambiente.edit');