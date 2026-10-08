<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use Livewire\Component;
use App\Models\Sensor;
use Illuminate\Validation\Rule;

class SensorCreate extends Component
{
    public $ambiente_id = '';
    public $codigo = '';
    public $tipo = '';
    public $descricao = '';
    public $status = true;
    public function mount(): void {}
    public function salvar()
    {
        $dados = $this->validate(['ambiente_id' => 'required|exists:ambientes,id', 'codigo' => 
        ['required', 'string', 'max:255', Rule::unique('sensors', 'codigo')], 'tipo' => 
        'required|string|max:255', 'descricao' => 'required|string', 'status' => 'boolean']);

        Sensor::create($dados);
        session()->flash('sucesso', 'Cadastro realizado com sucesso!');
        return $this->redirectRoute('sensores.index', navigate: true);
    }
    public function render()
    {
        return view('livewire.sensor.sensor-create', ['edicao' => false]);
    }
}
