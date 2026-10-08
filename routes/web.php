<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteDelete;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteIndex;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorDelete;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota principal (raiz) renderizando o componente Livewire diretamente
Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('sensores/create', SensorCreate::class)->name('sensores.create');
Route::get('/sensor/edit/{id}', SensorEdit::class)->name('sensores.edit');
Route::get('/sensor/index', SensorIndex::class)->name('sensores.index');
Route::get('/sensor/delete{id}', SensorDelete::class)->name('sensores.delete');

Route::get('ambientes/create', AmbienteCreate::class)->name('ambientes.create');
Route::get('ambientes/index', AmbienteIndex::class)->name('ambientes.index');
Route::get('/ambiente/edit/{id}', AmbienteEdit::class)->name('ambiente.edit');
Route::get('/ambiente/delete/{id}', AmbienteDelete::class)->name('ambiente.delete');